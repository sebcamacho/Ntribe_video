<?php

namespace App\Controller\Admin;

use App\Entity\PackVideos;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use Symfony\Component\DomCrawler\Field\FileFormField;

class PackVideosCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PackVideos::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nom'),
            TextareaField::new('description'),
            AssociationField::new('videos'),
            MoneyField::new('prix')->setCurrency('EUR'),
            SlugField::new('slug')->setTargetFieldName('nom'),

        ];
    }
    
}
