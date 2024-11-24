<?php

namespace DataMat\CheshireCat\DTO;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Why
{
    public ?string $input;

    /** @var null|array<string, mixed> */
    #[SerializedName('intermediate_steps')]
    public ?array $intermediateSteps = [];

    public Memory $memory;

    /** @var null|array<string, mixed> */
    #[SerializedName('model_interactions')]
    public ?array $modelInteractions = [];

    #[SerializedName('agent_output')]
    public ?AgentOutput $agentOutput = null;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $result = [
            'input' => $this->input,
            'intermediate_steps' => $this->intermediateSteps,
            'memory' => $this->memory->toArray(),
            'model_interactions' => $this->modelInteractions,
        ];

        if ($this->agentOutput !== null) {
            $result['agent_output'] = $this->agentOutput->toArray();
        }

        return $result;
    }
}
