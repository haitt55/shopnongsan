<?php

namespace App\Storage\Eloquent;

use App\Storage\AppSettingRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class AppSettingRepository implements AppSettingRepositoryInterface
{
    protected $model;
    
    protected $settings = [];

    public function __construct(Model $model)
    {
        $this->model = $model;

        $this->settings = $this->model->settings();
    }

    /**
     * Retrieve the given setting.
     *
     * @param  string $key
     * @return string
     */
    public function get($key)
    {
        return array_get($this->settings, $key);
    }

    /**
     * Create and persist a new setting.
     *
     * @param string $key
     * @param mixed  $value
     */
    public function set($key, $value)
    {
        $this->settings[$key] = $value;

        $this->persist();
    }

    /**
     * Determine if the given setting exists.
     *
     * @param  string $key
     * @return boolean
     */
    public function has($key)
    {
        return array_key_exists($key, $this->settings);
    }

    /**
     * Retrieve an array of all settings.
     *
     * @return array
     */
    public function all($columns = array('*'))
    {
        return $this->settings;
    }

    /**
     * Merge the given attributes with the current settings.
     * But do not assign any new settings.
     *
     * @param  array  $attributes
     * @return mixed
     */
    public function merge(array $attributes)
    {
        $this->settings = array_merge(
            $this->settings,
            array_only($attributes, array_keys($this->settings))
        );

        return $this->persist();
    }

    /**
     * Persist the settings.
     *
     * @return mixed
     */
    protected function persist()
    {
        foreach ($this->settings as $key => $value) {
            $appSetting = $this->model->key($key)->update(['value' => $value]);
        }
    }

    /**
     * Magic property access for settings.
     *
     * @param  string $key
     * @throws Exception
     * @return
     */
    public function __get($key)
    {
        if ($this->has($key)) {
            return $this->get($key);
        }

        throw new Exception("The {$key} setting does not exist.");
    }
}
?>