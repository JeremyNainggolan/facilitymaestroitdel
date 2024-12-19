<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE VIEW view_report_history AS (
        SELECT
          `r`.`report_id`   AS `report_id`,
          `r`.`reason`      AS `reason`,
          `r`.`filename`    AS `filename`,
          `r`.`report_date` AS `report_date`,
          `r`.`rent_id`     AS `rent_id`,
          `r`.`item_id`     AS `item_id`,
          `r`.`facility_id` AS `facility_id`,
          `r`.`user_id`     AS `user_id`,
          `u`.`name`     AS `user_name`,
          `re`.`status`     AS `rent_status`,
          `i`.`item_name`    AS `i_name`,
          `i`.`condition`	AS `i_condition`,
          `f`.`name`         AS `fa_name`,
          `f`.`condition`	AS `fa_condition`
        FROM ((((`report` `r`
              LEFT JOIN `rent` `re`
                ON (`r`.`rent_id` = `re`.`rent_id`))
             LEFT JOIN `users` `u`
               ON (`r`.`user_id` = `u`.`id`))
            LEFT JOIN `item` `i`
              ON (`r`.`item_id` = `i`.`item_id`))
           LEFT JOIN `facility` `f`
             ON (`r`.`facility_id` = `f`.`facility_id`)))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('view_report');
    }
};
