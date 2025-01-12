<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Voucher;
use Database\Seeders\VoucherSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VoucherTest extends TestCase
{
    public function testCreateVoucher()
    {
        $voucher = new Voucher();
        $voucher->name = "Sample Voucher";
        $voucher->voucher_code = "12413213123";
        $voucher->save();

        self::assertNotNull($voucher->id);
    }

    public function testCreateVoucherUUID()
    {
        $voucher = new Voucher();
        $voucher->name = "Sample Voucher";
        $voucher->save();

        self::assertNotNull($voucher->id);
        self::assertNotNull($voucher->voucher_code);
    }

    public function testSoftDeletes()
    {
        $this->seed(VoucherSeeder::class);

        $voucher = Voucher::query()->where('name', 'Sample Voucher')->first();
        $voucher->delete();

        $voucher = Voucher::query()->where('name', 'Sample Voucher')->first();
        self::assertNull($voucher);

        $voucher = Voucher::withTrashed()->where('name', 'Sample Voucher')->first();
        self::assertNotNull($voucher);
    }
}
