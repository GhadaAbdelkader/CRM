<?php

namespace App\Livewire;

use AllowDynamicProperties;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

#[AllowDynamicProperties] class FormBuilder extends Component
{
    public $elements = [];
    public $fontsize;
    public $fontcolor;
    public $padding;
    public $availableFields = [
        'text'     => ['label' => 'Text Field', 'icon'    => 'text_fields'],
        'textarea' => ['label' => 'Paragraph', 'icon'     => 'article'],
        'select'   => ['label' => 'Dropdown', 'icon'      => 'arrow_drop_down'],
        'radio'    => ['label' => 'Radio Button', 'icon'  => 'radio_button_checked'],
        'checkbox' => ['label' => 'Checkbox', 'icon'      => 'select_check_box'],
        'date'     => ['label' => 'Date', 'icon'          => 'calendar_month'],
        'time'     => ['label' => 'Time', 'icon'          => 'history_toggle_off'],
        'number'   => ['label' => 'Number', 'icon'        => '123'],
        'file'     => ['label' => 'File Upload', 'icon'   => 'upload_file'],
        'email'    => ['label' => 'Email Field', 'icon'   => 'mail'],
        'image'    => ['label' => 'Image Upload', 'icon'  => 'image'],
        'header'   => ['label' => 'Form Header', 'icon'   => 'format_h1'],
        'section'  => ['label' => 'Section Break', 'icon' => 'more_horiz'],
    ];
    public $layouts = [
        'single' => 'Single Column Layout',
        'double' => 'Two Column Layout',
        'triple' => 'Three Column Layout',
    ];





    public $selectedElement = ''; // Add this property

//    protected $listeners = ['updateStyles' => 'updateStyle'];
//
//    public function updateStyle($fontsize, $fontcolor, $padding)
//    {
//        $this->fontsize = $fontsize;
//        $this->fontcolor = $fontcolor;
//        $this->padding = $padding;
//
//    }


    public function addElement($field, $position = null)
    {
        $uniqueId = uniqid($field['type'] . '_'); // Generate a unique ID for the element
        $newElement = [
            'id' => $uniqueId,
            'type' => $field['type'],
            'label' => ucfirst($field['type']),
            'options'=> ['Option 1', 'Option 2', 'Option 3'] // Example options
        ];

        if ($field['type'] === 'layout') {
            $sectionCount = $field['layoutType'] === 'single' ? 1 : ($field['layoutType'] === 'double' ? 2 : 3);
            $newElement = [
                'id' => $uniqueId,
                'type' => 'layout',
                'layoutType' => $field['layoutType'],
                'sections' => array_fill(0, $sectionCount, []),
            ];
        }

        if ($position !== null) {
            array_splice($this->elements, $position, 0, [$newElement]);
            $index = $position;
            Log::debug('Element added at position:', ['position' => $position, 'element' => $newElement]);
        } else {
            $this->elements[] = $newElement;
            $index = count($this->elements) - 1;
            Log::debug('Element added at end:', ['element' => $newElement]);
        }

        return $index;
    }

    public function saveStyles()
    {
        $this->dispatch('notify', 'Styles saved successfully!');
    }

    public function addFieldToSection($layoutIndex, $sectionIndex, $fieldType)
    {
        $this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][] = [
            'type' => $fieldType,
            'label' => $this->availableFields[$fieldType],
        ];
    }

    public function removeElement($id)
    {
        $this->elements = array_filter($this->elements, function ($element) use ($id) {
            return $element['id'] !== $id;
        });
        $this->elements = array_values($this->elements);

    }
    public function removeLayout($id)
    {
        // Logic to remove the entire layout
        if (isset($this->elements[$id])) {
            // Remove the layout
            array_splice($this->elements, $id, 1);
        }
    }
    public function removeFieldFromSection($layoutIndex, $sectionIndex, $fieldIndex)
    {
        unset($this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'][$fieldIndex]);
        $this->elements[$layoutIndex]['sections'][$sectionIndex]['fields'] = array_values($this->elements[$layoutIndex]['sections'][$sectionIndex]['fields']); // Re-index fields
    }

    public function saveForm()
    {
        // Save form to the database or session
        session()->flash('message', 'Form saved successfully.');
    }

    public function render()
    {
        return view('livewire.form-builder')->layout('layouts.app');
    }
}
