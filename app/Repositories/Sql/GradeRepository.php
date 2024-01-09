<?php

        namespace App\Repositories\Sql;
        use App\Models\Grade;
        use App\Repositories\Contract\GradeRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class GradeRepository extends BaseRepository implements GradeRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Grade();

            }

        }
        