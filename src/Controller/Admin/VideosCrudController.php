<?php

namespace App\Controller\Admin;

use App\Entity\Videos;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Image;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\FileUploadType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use Symfony\Component\DomCrawler\Field\FileFormField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

class VideosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Videos::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextareaField::new('description'),               
            SlugField::new('slug')->setTargetFieldName('nom'),
            TextEditorField::new('videoFile')
                ->hideOnIndex()
                ->setLabel('Video')
                ->setFormType(VichFileType::class),
            DateField::new('createdAt')->setLabel('Add from')->setFormat('long')->hideOnForm()
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDefaultSort(['createdAt' => 'DESC']);
    }
   
}
// Field::new('videoFile'),
            // ->setFormType(VichImageType::class),
            
            // TextField::new('path')
            //         ->setLabel('video')
            //         ->setFormType(fileUploadType::class)
            //         ->setFormTypeOptions([
            //             'constraints' => [
            //                 new File([
            //                     'maxSize' => '1000000000k'
            //                 ])
            //             ]
            //         ]),
            
            // Field::new('path')
            // ->setFormType(FileUploadType::class)
            // ->setFormTypeOptions([
            //     // 'mapped' => false,
            //     'constraints' => [
            //                 new File([
            //                     'maxSize' => '100000M'
            //                 ])
            //             ]
            // ]),

            // ImageField::new('path')
            //     ->setLabel('video')
            //     ->setBasePath('assets/videos/')
            //     ->setUploadDir('public/assets/videos/')
            //     ->setUploadedFileNamePattern('[slug].[extension]')
            //     ->setRequired(false)
            //     ->setFormTypeOptions([
            //             'required' => false,
            //             'constraints' => [
            //                 new File([
            //                     'maxSize' => '100000M'
            //                 ])
            //             ]
            //         ]),
