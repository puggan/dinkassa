<?php


namespace Dinkassa;


class Credentials
{
    /** @var string $IntegratorId */
    public $IntegratorId;
    /** @var string $MachineId */
    public $MachineId;
    /** @var string $MachineKey */
    public $MachineKey;

    public function __construct(string $iId, string $mId, string $mKey)
    {
        $this->IntegratorId = $iId;
        $this->MachineId = $mId;
        $this->MachineKey = $mKey;
    }

    public static function loadEnv($prefix = ''): Credentials
    {
        return new self(
            getenv($prefix . 'INTEGRATOR_ID') ?: getenv('INTEGRATOR_ID'),
            getenv($prefix . 'MACHINE_ID'),
            getenv($prefix . 'MACHINE_KEY')
        );
    }

    /**
     * @return string[]
     */
    public function headers(): array
    {
        return [
            "IntegratorId" => $this->IntegratorId,
            "MachineId" => $this->MachineId,
            "MachineKey" => $this->MachineKey,
        ];
    }
}