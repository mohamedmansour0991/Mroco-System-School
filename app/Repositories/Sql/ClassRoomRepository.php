<?php

        namespace App\Repositories\Sql;
        use App\Models\ClassRoom;
        use App\Repositories\Contract\ClassRoomRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class ClassRoomRepository extends BaseRepository implements ClassRoomRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new ClassRoom();

            }

        }
        