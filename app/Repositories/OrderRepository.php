<?php  

namespace App\Repositories;

use App\Models\Order;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    /**
     * Returns all the orders from the database.
     * @param bool $noEmptyValue
     * @throws \Exception
     * @return Collection<int, TModel>
     */
    public function all(bool $noEmptyValue): Collection
    {
        $orders = $this->defaultQuery()->get();

        if (count($orders) == 0 && $noEmptyValue) {
            throw new Exception("There where no orders found in the database.", 404);
        }

        return $orders;
    }

    /**
     * Returns a base query for the orders wit hall the joins.
     * @return Builder<Order>
     */
    public function defaultQuery(): Builder
    {
        return Order::query()->select('orders.*', 'users.first_name as userFirstName', 'users.last_name as userLastName',
            'guest_users.first_name as guestFirstname', 'guest_users.last_name as guestLastName', 'order_statuses.status as orderStatusName','payment_name',
            'exhibition_name')
            ->leftJoin('users', 'user_id', '=', 'users.id')
            ->leftJoin('guest_users', 'guest_user_id', '=', 'guest_users.id')
            ->leftJoin('order_statuses', 'order_status_id', '=', 'order_statuses.id')
            ->leftJoin('payment_options', 'payment_option_id', '=', 'payment_options.id')
            ->leftJoin('exhibitions', 'exhibition_id', '=', 'exhibitions.id');
    }
}