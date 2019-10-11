<?php


namespace App\Bazar\ConnectDBBundle\Helpers;


class Crypter
{
    /**
     * Метод шифрования
     *
     * @var string
     */
    protected $method;

    /**
     * Ключ шифрования
     *
     * @var string
     */
    protected $key;

    public function __construct($key, $method = 'AES-256-CBC')
    {
        $this->key    = $key;
        $this->method = $method;
    }

    /**
     * Шифрование строки
     * @return string
     * @throws \Exception
     */
    public function encrypt($value)
    {
        $iv = random_bytes(16);

        $value = openssl_encrypt($value, $this->method, $this->key, 0, $iv);

        $json = json_encode([
            'iv'    => base64_encode($iv),
            'value' => $value
        ]);

        return base64_encode($json);
    }

    /**
     * Расшифровка строки
     * @return string
     */
    public function decrypt($value)
    {
        $data = json_decode(base64_decode($value), true);

        if (!$this->validOptions($data)) {
            throw new RuntimeException('Передана некорректная строка для расшифровки');
        }

        $iv = base64_decode($data['iv']);

        return openssl_decrypt($data['value'], $this->method, $this->key, 0, $iv);
    }

    /**
     * Проверка данных из шифрованной строки на корректность.
     * @return string
     */
    protected function validOptions($options)
    {
        if (!is_array($options)) {
            return false;
        }

        return isset($options['iv'], $options['value']);
    }
}