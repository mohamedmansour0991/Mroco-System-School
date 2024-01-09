<?php

        namespace App\Repositories\Sql;
        use App\Models\Room;
        use App\Repositories\Contract\RoomRepositoryInterface;
        use Illuminate\Database\Eloquent\Collection;

        class RoomRepository extends BaseRepository implements RoomRepositoryInterface
        {

            public function __construct()
            {

                return $this->model = new Room();

            }

        }
        