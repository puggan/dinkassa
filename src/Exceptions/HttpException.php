<?php


namespace Dinkassa\Exceptions;


use Psr\Http\Message\ResponseInterface as Response;

class HttpException extends \RuntimeException
{
    const ERROR_400 = 'Bad Request';
    const ERROR_401 = 'Unauthorized';
    const ERROR_403 = 'Forbidden';
    const ERROR_404 = 'Not Found';
    const ERROR_405 = 'Method Not Allowed';
    const ERROR_406 = 'Not Acceptable';
    const ERROR_409 = 'RequestKey provided has already been received and may not be used again or the requestkey is not a valid GUID/UUID.';
    const ERROR_410 = 'Gone';
    const ERROR_429 = 'Too Many Requests';
    const ERROR_500 = 'Internal Server Error';
    const ERROR_503 = 'Service Unavailable';

    /** @var Response */
    public $response;

    /**
     * @param Response $response
     * @return HttpException
     */
    public static function fromResponse(Response $response): HttpException
    {
        $code = $response->getStatusCode();
        $message = $response->getReasonPhrase();
        if (!$message) {
            $constName = self::class . '::ERROR_' . $code;
            if (defined($constName)) {
                $message = constant($constName);
            } else {
                $message = 'ERROR ' . $code;
            }
        }
        $exception = new self($message, $code);
        $exception->response = $response;
        return $exception;
    }
}