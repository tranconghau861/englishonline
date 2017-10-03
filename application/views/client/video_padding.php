    
	<ul class="pagination">
        <?php

        $page_number_lst = $livetv_video['number_page'];

        $offset = $livetv_video['offset'];

        if (!$offset)

            $offset = 1;

        if (!$page_number_lst)

            $page_number_lst = 1;

        if ($offset > 2) {

            ?>

            <li class="text-paging first-paging"  offset="<?php echo 1; ?>"><a href="javascript:void(0);">&lt;&lt;</a></li>

            <?php

        }

        if ($offset > 1) {

            ?>

            <li class="text-paging prev-paging"  offset="<?php echo $offset - 1; ?>"><a href="javascript:void(0);">&lt;</a></li>

            <?php

        }



        if ($offset > 40) {

            $new_index = $offset - 40;

            ?>

            <li class="num-pagings"  offset="<?php echo $new_index; ?>"><a href="javascript:void(0);"><?php echo $new_index ?></a></li>

            <?php

        }

        if ($offset > 10) {

            $new_index = $offset - 10;

            ?>

            <li class="num-pagings"  offset="<?php echo $new_index; ?>"><a href="javascript:void(0);"><?php echo $new_index ?></a></li>

            <?php

        }

        if ($offset > 1) {

            $new_index = $offset - 1;

            ?>

            <li class="num-pagings"  offset="<?php echo $new_index; ?>"><a href="javascript:void(0);"><?php echo $new_index ?></a></li>

            <?php

        }

        ?>

        <li class="num-pagings page_number_active"  offset="<?php echo $offset; ?>" is_selected="true"><a class="active" href="javascript:void(0);" ><?php echo $offset ?></a></li>

        <?php

        if ($page_number_lst >= $offset + 1) {

            $new_index = $offset + 1;

            ?>

            <li class="num-pagings"  offset="<?php echo $new_index; ?>"><a href="javascript:void(0);"><?php echo $new_index ?></a></li>

            <?php

        }



        if ($page_number_lst > $offset + 40) {

            $new_index = $offset + 40;

            ?>

            <li class="num-pagings"  offset="<?php echo $new_index; ?>"><a href="javascript:void(0);"><?php echo $new_index ?></a></li>

            <?php

        }

        if ($page_number_lst >= $offset + 1) {

            ?>

            <li class="text-paging next-paging"  offset="<?php echo $offset + 1; ?>"><a href="javascript:void(0);">&gt;</a></li>

            <?php

        }

        if ($page_number_lst >= $offset + 2) {

            ?>

            <li class="text-paging last-paging"  offset="<?php echo $page_number_lst; ?>"><a href="javascript:void(0);">&gt;&gt;</a></li>

                <?php

            }

            ?>

    </ul>
    