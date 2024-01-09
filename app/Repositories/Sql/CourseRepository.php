<?php

        namespace App\Repositories\Sql;
        use App\Models\Course;
        use App\Repositories\Contract\CourseRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class CourseRepository extends BaseRepository implements CourseRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Course();

            }

        }
        