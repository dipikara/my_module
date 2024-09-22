<?php 
namespace Drupal\my_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class MyConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['my_module.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'my_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('my_module.settings');

    $form['example_setting'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Example Setting'),
      '#default_value' => $config->get('example_setting'),
      '#description' => $this->t('An example setting for the custom config form.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('my_module.settings')
      ->set('example_setting', $form_state->getValue('example_setting'))
      ->save();
  }
}