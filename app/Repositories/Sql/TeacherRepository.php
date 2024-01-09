<?php

        namespace App\Repositories\Sql;
        use App\Models\Teacher;
        use App\Repositories\Contract\TeacherRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class TeacherRepository extends BaseRepository implements TeacherRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Teacher();

            }

        }
        