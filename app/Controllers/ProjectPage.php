<?php

namespace App\Controllers;

use App\Models\EstimatedModel;
use App\Models\ProjectsModel;

class ProjectPage extends BaseController
{
    public function index($slug)
    {
        // Получите данные о проекте по его уникальному слагу
        $projectModel = model(ProjectsModel::class);
        $estimatedModel = model(EstimatedModel::class);

        $data = ['project' => $projectModel->getProjectBySlug($slug),
                'estimated' => $estimatedModel->getEstimatedBySlug($slug),
                'title' => 'Страница проекта'];


        return view('templates/header', $data)
            . view('projects/project_page', $data)
            . view('templates/footer');


//        return view('project_page', ['projectData' => $projectData]);
    }
}
