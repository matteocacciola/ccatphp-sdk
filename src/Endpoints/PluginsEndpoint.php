<?php

namespace DataMat\CheshireCat\Endpoints;

use DataMat\CheshireCat\DTO\Api\Plugin\PluginCollectionOutput;
use DataMat\CheshireCat\DTO\Api\Plugin\PluginsSettingsOutput;
use DataMat\CheshireCat\DTO\Api\Plugin\PluginToggleOutput;
use DataMat\CheshireCat\DTO\Api\Plugin\Settings\PluginSettingsOutput;
use GuzzleHttp\Exception\GuzzleException;

class PluginsEndpoint extends AbstractEndpoint
{
    protected string $prefix = '/plugins';

    /**
     * This endpoint returns the available plugins, either for the agent identified by the agentId parameter
     * (for multi-agent installations) or for the default agent (for single-agent installations).
     *
     * @throws GuzzleException
     */
    public function getAvailablePlugins(?string $pluginName = null, ?string $agentId = null): PluginCollectionOutput
    {
        return $this->get(
            $this->prefix,
            PluginCollectionOutput::class,
            $agentId,
            null,
            $pluginName ? ['query' => $pluginName] : []
        );
    }

    /**
     * This endpoint toggles a plugin, either for the agent identified by the agentId parameter (for multi-agent
     * installations) or for the default agent (for single-agent installations).
     *
     * @throws GuzzleException
     */
    public function putTogglePlugin(string $pluginId, ?string $agentId = null): PluginToggleOutput
    {
        return $this->put(
            $this->formatUrl('/toggle/' . $pluginId),
            PluginToggleOutput::class,
            [],
            $agentId,
        );
    }

    /**
     * This endpoint retrieves the plugins settings, either for the agent identified by the agentId parameter
     * (for multi-agent installations) or for the default agent (for single-agent installations).
     *
     * @throws GuzzleException
     */
    public function getPluginsSettings(?string $agentId = null): PluginsSettingsOutput
    {
        return $this->get(
            $this->formatUrl('/settings'),
            PluginsSettingsOutput::class,
            $agentId,
        );
    }

    /**
     * This endpoint retrieves the plugin settings, either for the agent identified by the agentId parameter
     * (for multi-agent installations) or for the default agent (for single-agent installations).
     *
     * @throws GuzzleException
     */
    public function getPluginSettings(string $pluginId, ?string $agentId = null): PluginSettingsOutput
    {
        return $this->get(
            $this->formatUrl('/settings/' . $pluginId),
            PluginSettingsOutput::class,
            $agentId,
        );
    }

    /**
     * This endpoint updates the plugin settings, either for the agent identified by the agentId parameter
     * (for multi-agent installations) or for the default agent (for single-agent installations).
     *
     * @param array<string, mixed> $values
     *
     * @throws GuzzleException
     */
    public function putPluginSettings(string $pluginId, array $values, ?string $agentId = null): PluginSettingsOutput
    {
        return $this->put(
            $this->formatUrl('/settings/' . $pluginId),
            PluginSettingsOutput::class,
            $values,
            $agentId,
        );
    }
}