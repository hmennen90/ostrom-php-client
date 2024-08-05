<?php

namespace Hmennen90\OstromPhpClient\Service\Ostrom;

use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\Auth\GetTokenRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Requests\BaseRequest;
use Hmennen90\OstromPhpClient\Service\Ostrom\Responses\BaseResponse;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Service\Ostrom\Exceptions\UnsupportedHttpVerbException;

class OstromServiceConnector
{
    public function __construct(
        protected ?PendingRequest $httpClient = null,
        private ?string $accessToken = null,
        private ?Carbon $expiresAt = null,
    ) {
        $this->httpClient = Http::baseUrl(config('ostrom.api_url'))
            ->acceptJson()->asForm();
    }

    public function authenticate(): void
    {
        $authRequest = new GetTokenRequest;
        $authResponse = Http::baseUrl(config('ostrom.auth_api_url'))->withBasicAuth(config('ostrom.client_id'), config('ostrom.client_secret'))
            ->post($authRequest->endpoint(), $authRequest->body());

        if ($authResponse->successful()) {
            $this->accessToken = $authResponse->json()['access_token'];
            $this->expiresAt = Carbon::now()->addSeconds($authResponse->json()['expires_in']);
        } else {
            throw new \Exception('Ostrom Authentication failed');
        }
    }

    public function executeRequest(BaseRequest $request): BaseResponse|Collection|string
    {
        if (! $this->accessToken || Carbon::now()->isAfter($this->expiresAt)) {
            $this->authenticate();
        }

        $this->httpClient = $this->httpClient->withToken($this->accessToken);

        $response = match ($request->method()) {
            'get' => $this->httpClient->get($request->endpoint()),
            'post' => $this->httpClient->post($request->endpoint(), $request->body()),
            default => throw new UnsupportedHttpVerbException("Only get and post are currently supported for Ostrom")
        };

        if ($request->responseClass()) {
            if ($response->status() !== 200) {
                throw new \Exception($response->body());
            }
            $responseClass = $request->responseClass();
            if ($response->json('data')) {
                return $response->collect('data')->map(fn ($data) => new $responseClass(...$data));
            }

            return new $responseClass(...json_decode($response->body(), true));
        }

        return $response->body();
    }
}
