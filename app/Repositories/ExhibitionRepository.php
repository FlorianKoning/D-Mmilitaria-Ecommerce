<?php

namespace App\Repositories;

use App\Factories\OrderStatusFactory;
use App\Utils\ReservedHelper;
use Exception;
use App\Models\Order;
use App\Models\Exhibition;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Collection;

class ExhibitionRepository
{
    public function __construct(
        protected ReservedHelper $reservedHelper,
        protected OrderStatusFactory $orderStatusFactory,
    ){}

   /**
    * Returns all the exhibitions where the owner is present.
    * If there are no exhibitions a exception will be thrown.
    * @throws \Exception
    * @return Collection<int, Exhibition>
    */
   public function all(Order $order): Collection|Exception
   {
        $exhibitions = Exhibition::all()->where('present', true);

        if (count($exhibitions) <= 0) {
            $order->update([
                'order_status_id' => OrderStatus::$failed,
            ]);

            $this->orderStatusFactory->make(OrderStatus::$failed, $order);

            throw new Exception('There are no exhibitions at the moment, please select a different payment method.');
        }

        return $exhibitions;
   }
}
