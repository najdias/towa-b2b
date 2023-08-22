<?php

namespace Pyz\Yves\CheckoutPage\Form\Steps;

use Spryker\Yves\Kernel\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class OrderNameForm extends AbstractType
{
    protected const FIELD_ORDER_NAME = 'order_name';

    protected const VALIDATION_NOT_BLANK_MESSAGE = 'validation.not_blank';

    protected const VALIDATION_MAX_LENGTH_MESSAGE = 'validation.max_length';

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $this->addOrderNameField($builder);
    }

    protected function addOrderNameField(FormBuilderInterface $builder): static
    {
        $builder->add(static::FIELD_ORDER_NAME, TextType::class, [
            'label' => 'checkout.order_name',
            'required' => true,
            'trim' => true,
            'sanitize_xss' => true,
            'constraints' => [
                $this->createNotBlankConstraint(),
                $this->createMaxLengthConstraint(),
                $this->createOrderNameRegexConstraint(),
            ],
        ]);

        return $this;
    }

    protected function createNotBlankConstraint(): NotBlank
    {
        return new NotBlank(['message' => static::VALIDATION_NOT_BLANK_MESSAGE]);
    }

    protected function createMaxLengthConstraint(): Length
    {
        return new Length([
            'max' => 30,
            'maxMessage' => static::VALIDATION_MAX_LENGTH_MESSAGE,
        ]);
    }

    protected function createOrderNameRegexConstraint(): Regex
    {
        return new Regex([
            'pattern' => '/^[a-z0-9 ]+$/',
        ]);
    }
}
