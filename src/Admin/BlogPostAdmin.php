<?php

namespace App\Admin;

use App\Entity\Category;
use App\Form\TagForm;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\CollectionType;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $form): void
    {
        $form->add('title', TextType::class);
        $form->add('body', TextareaType::class);
        $form->add('category', EntityType::class, [
            'class' => Category::class,
            'choice_label' => 'name'
        ]);
        $form->add('tags', CollectionType::class, [
            'allow_add' => true,
            'allow_delete' => true,
            'entry_type' => TagForm::class,
            'prototype' => true,
            'by_reference' => true
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('title');
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('title');
        $list->addIdentifier('category');
    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->add('title');
    }
}
