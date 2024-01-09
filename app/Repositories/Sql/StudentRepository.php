<?php

        namespace App\Repositories\Sql;
        use App\Models\Student;
        use App\Repositories\Contract\StudentRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class StudentRepository extends BaseRepository implements StudentRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Student();

            }

        }
        