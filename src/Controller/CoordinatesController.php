<?php

declare(strict_types=1);

namespace App\Controller;

use App\DataTransferObject\Request\AddressRequestDto;
use App\DataTransferObject\Request\UserDto;
use App\DataTransferObject\Response\ValidationErrorResponseDto;
use App\Service\Geocode\GeocoderInterface;
use App\Transformer\HttpRequestTransformer;
use App\Transformer\HttpResponseTransformer;
use App\Transformer\ValidationErrorTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ExampleController extends AbstractController
{
    private ExampleServiceInterface $exampleService;
    private HttpRequestTransformer $httpRequestTransformer;
    private ValidatorInterface $validator;
    private ValidationErrorTransformer $validationErrorTransformer;
    private HttpResponseTransformer $httpResponseTransformer;

    public function __construct(
        GeocoderInterface $geocoder,
        HttpRequestTransformer $httpRequestTransformer,
        ValidatorInterface $validator,
        ValidationErrorTransformer $validationErrorTransformer,
        HttpResponseTransformer $httpResponseTransformer
    ) {
        $this->geocoder = $geocoder;
        $this->httpRequestTransformer = $httpRequestTransformer;
        $this->validator = $validator;
        $this->validationErrorTransformer = $validationErrorTransformer;
        $this->httpResponseTransformer = $httpResponseTransformer;
    }

    /**
     * @Route(path="/example", name="example")
     * @param Request $request
     * @return Response
     */
    public function performAction(Request $request): Response
    {
        $serviceRequest = $this->httpRequestTransformer->transform($request, new UserDto());
        $validationErrors = $this->validator->validate($serviceRequest);

        if ($validationErrors->count() > 0) {
            return $this->validationErrorTransformer->transform(
                (new ValidationErrorResponseDto())->setErrors($validationErrors)
            );
        }

        return $this->httpResponseTransformer->transform(
            $this->exampleService->handle($serviceRequest)
        );
    }
}
