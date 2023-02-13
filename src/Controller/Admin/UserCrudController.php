<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

        public function configureFields(string $pageName): iterable
        {
            return [
                TextField::new('prenom'),
                TextField::new('email'),
                TextField::new('user_Picture')->setFormType(VichImageType::class)->onlyOnIndex(),
                ImageField::new('userPicture')
                ->setBasePath('uploads/avatars')
                ->setUploadDir('public/uploads/avatars'),
            ];
        }
}
