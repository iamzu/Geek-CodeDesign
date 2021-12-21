<?php
namespace Token;

class AuthToken
{
    private const DEFAULT_EXPIRED_TIME = 5 * 60;
    private string $token;
    private int $createTime;
    private $expiredTimeInterval = self::DEFAULT_EXPIRED_TIME;

    public function __construct(string $token, int $createTime = 0)
    {
        $this->token = $token;
        $this->createTime = $createTime;
    }

    /**
     * @return mixed
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @return bool
     */
    public function isExpired(): bool
    {
        if ($this->createTime > (time() + $this->expiredTimeInterval)) {
            return true;
        }
        return false;
    }

    /**
     * @param  AuthToken  $token
     * @return bool
     */
    public function match(AuthToken $token): bool
    {
        if ($this->token === $token->token) {
            return true;
        }
        return false;
    }

    /**
     * @param $params
     * @param $key
     * @return AuthToken
     */
    public static function generate($params, $key)
    {
        $str = implode('_', $params);
        $token = md5("{$str}_{$key}_{$key}");
        return new AuthToken($token);
    }
}

?>
