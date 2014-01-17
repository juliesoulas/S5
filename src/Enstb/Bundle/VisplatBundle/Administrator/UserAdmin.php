<?php

namespace Enstb\Bundle\VisplatBundle\Administrator;


use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', array('label' => 'Name'))
            ->add('lastName', 'text', array('label' => 'Last name'))
            ->add('email') //if no type is specified, SonataAdminBundle tries to guess it
            ->add('username')
            ->add('password')
            ->add('roles','sonata_type_model',array(
                'expanded' => true,
                'compound' => true,
                'multiple' => true,
                'by_reference' => false
            ));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('lastName')
            ->add('roles')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('lastName')
            ->add('email')
            ->add('roles','sonata_type_model')
        ;
    }


}