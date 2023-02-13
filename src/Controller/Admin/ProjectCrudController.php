<?php

namespace App\Controller\Admin;

use App\Entity\Project;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            yield TextField::new('titre'),
            yield TextField::new('description'),
            yield TextField::new('url'),
            yield TextField::new('project_Picture')->setFormType(VichImageType::class)->onlyOnIndex(),
            yield ImageField::new('projectPicture')
            ->setBasePath('uploads/avatars')
            ->setUploadDir('public/uploads/avatars'),
        ];
    }
}
