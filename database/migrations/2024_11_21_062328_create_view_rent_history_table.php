<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE VIEW view_rent_history AS (
            SELECT
                r.`rent_id` AS rent_id,
                r.`item_id` AS item_id,
                r.`facility_id` AS facility_id,
                r.`user_id` AS user_id,
                r.`status` AS rent_status,
                r.`request_date` AS req_date,
                r.`approve_date` AS app_date,
                r.`return_date` AS rturn_date,
                r.`rent_date` AS rent_date,
                u.`name` AS user_name,
                i.`filename` AS i_filename,
                i.`item_name` AS i_name,
                i.`item_status` AS i_stat,
                i.`condition` AS i_con,
                f.`filename` AS fa_filename,
                f.`name` AS fa_name,
                f.`status` AS fa_status,
                f.`condition` AS fa_cond
            FROM
                rent r
            LEFT JOIN
                users u ON r.`user_id` = u.`id`
            LEFT JOIN
                item i ON r.`item_id` = i.`item_id`
            LEFT JOIN
                facility f ON r.`facility_id` = f.`facility_id`
                    )');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_rent_history');
    }
};
