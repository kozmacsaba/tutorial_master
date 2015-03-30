<?php

/**
 * Default options for inputs.
 * Used by default FormHelper class.
 *
 * @var array
 */
Configure::write('Bs3.Form.styles', array(
    'horizontal' => array(
        'formDefaults' => array(
            'submitDiv' => ' ',
            'submitButton' => 'btn-u btn-u-green pull-right'
        ),
        'inputDefaults' => array(
            'label' => array(
                'class' => 'col-sm-2 col-lg-2 control-label'
            ),
            'wrap' => 'col-sm-10 col-lg-4',
        )
    ),
    'inline' => array(
        'inputDefaults' => array(
            'label' => array(
                'class' => 'sr-only'
            ),
        )
    ),
    'enquete' => array(
        'formDefaults' => array(
            'submitDiv' => ' ',
            'submitButton' => 'enquete_submit'
        ),
        'inputDefaults' => array(
            'label' => array(
                'class' => 'col-xs-12 col-md-3 control-label'
            ),
            'wrap' => 'col-xs-12 col-md-4'
        )
    )
));
