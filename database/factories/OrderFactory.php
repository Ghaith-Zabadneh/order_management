<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(User::where('role','user')->pluck('id')->toArray()),
            'subject' =>$this->faker->randomElement(['الحصول على موافقة','الحصول على ترخيص','زيادة الراتب','الحصول على ترقيه']),
            'description' => 'هذا الوصف تجريبي لعملية ادخال طلب جديد. يمكن للمستخدم إدخال وصف الطلب هنا.',
            'order_status' => $this->faker->randomElement('قيد المعالجة','مقبول','مرفوض')
        ];
    }
}
