<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title'=>'Nộm bò khô, bánh bột lọc - Quán Nộm Long Vi Dung',
            'summary'=>'Nộm bò khô là món ăn trứ danh tại Hà Nội mà ai ai cũng biết đến. Nộm bò khô ở Hà Nội rất nhiều, từ gánh hàng rong cho tới nhà hàng “sang chảnh” đâu đâu cũng có nhưng khi nói về địa chỉ quán nộm ngon',
            'content'=>'Nộm bò khô là món ăn trứ danh tại Hà Nội mà ai ai cũng biết đến. Nộm bò khô ở Hà Nội rất nhiều, từ gánh hàng rong cho tới nhà hàng “sang chảnh” đâu đâu cũng có nhưng khi nói về địa chỉ quán nộm ngon, dân sành ăn Hà Thành không ai là không biết tới nộm Long Vi Dung nổi tiếng phố Hồ Hoàn Kiếm - phố "nộm" ngay trung tâm phố cổ. Vì đã bán từ lâu đời và có uy tín nên phố "nộm" lúc nào cũng tấp nập khách. Đĩa nộm bò khô ở đây khá đầy đặn, ngoài đu đủ nạo sợi truyền thống và rau thơm còn có rất nhiều thịt bò: thịt bò khô cắt miếng, thịt bò luộc thái lát mỏng, gân bò, mề quay, gan sấy…phong phú. Khi thưởng thức, tất cả được trộn đều cùng thứ nước trộn chua ngọt rất vừa miệng. Một đĩa nộm ở đây có giá 35.000 đồng, có thể ăn kèm với bánh bột lọc cũng khá mềm và thơm.



                Địa chỉ: Số 23 Hồ Hoàn Kiếm, Quận Hoàn Kiếm, Hà Nội
                Giờ mở cửa: 08:00 - 21:30
                Giá tham khảo: 35.000 đồng/ đĩa',
					'image_small'=>'image2.png',
					'image_big'=>'image2.png',
					'id_cat'=>1,
                    'views'=>0,
                    'status'=>1,
            		'created_at'=>date('Y-m-d H:i:s'),
        			'updated_at'=>null

        ]);
    }
}
