<?php
declare(strict_types=1);

namespace Dinkassa;

use Dinkassa\Exceptions\EntityMissing;
use Dinkassa\Exceptions\HttpException;
use Dinkassa\Models\InventoryItem;
use GuzzleHttp\Client as GuzzleClient;

class Api
{
    /** @var Credentials $credentials */
    private $credentials;

    /** @var \GuzzleHttp\Client */
    private $client;

    public function __construct(Credentials $credentials, $apiUrl = 'https://www.dinkassa.se/api/')
    {
        $this->credentials = $credentials;
        $this->client = new GuzzleClient(['base_uri' => $apiUrl, 'headers' => $credentials->headers()]);
    }

    private function get(string $url): \stdClass
    {
        $response = $this->client->request('GET', $url);
        if ($response->getStatusCode() >= 300) {
            throw HttpException::fromResponse($response);
        }
        return (object) \json_decode($response->getBody(), false);
    }

    /**
     * @param string $id
     * @return InventoryItem
     */
    public function InventoryItem(string $id): InventoryItem
    {
        try {
            $data = $this->get('inventoryitem/' . $id);
        } catch (HttpException $exception) {
            switch ($exception->getCode())
            {
                case 404:
                    throw EntityMissing::fromException($exception);

                default:
                    throw $exception;
            }
        }

        if (!$data) {
            throw new \RuntimeException('Not implemented');
        }

        return new InventoryItem($data->Item);
    }

    /**
     * @return InventoryItem[]
     */
    public function InventoryItems(): array
    {
        $offset = 0;
        $fetchSize = 200;
        $list = [];
        do {
            $more = $this->InventoryItemsInterval($offset, $fetchSize);
            $offset += $fetchSize;
            foreach($more as $item) {
                $list[] = $item;
            }
        } while (\count($more) === $fetchSize);

        return $list;
    }

    /**
     * @param int $offset [0,*]
     * @param int $length [1,200]
     * @return InventoryItem[]
     */
    public function InventoryItemsInterval(int $offset, int $length): array
    {
        $parameters = [
            'offset' => $offset,
            'fetch' => $length,
        ];
        $data = $this->get('inventoryitem/?' . http_build_query($parameters));
        $list = [];
        foreach ($data->Items as $item) {
            $list[] = new InventoryItem($item);
        }
        return $list;
    }
}