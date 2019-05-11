<?php

use Illuminate\Database\Seeder;

class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Faq::class)->create([
            'title_ar' => ' هل تستوعب حميات أو حميات معينة؟',
            'content_ar' => ' نحن نستوعب مجموعة متنوعة من التفضيلات الغذائية - على سبيل المثال النباتيين ، أو إذا كنت لا تأكل اللحوم الحمراء والأسماك والمحار ، أو لحم الضأن - وتخصيص القائمة الخاصة بك كل أسبوع بناء على تفضيلاتك. يتم تجميع كل صناديقنا في نفس منشأة المعالجة ، لذلك لا نوصي بالطلب  إذا كان لديك حساسية خطيرة للأطعمة.',
            'title_en' => 'Do you accommodate specific diets or allergies?',
            'content_en' => 'We accommodate a variety of dietary preferences - e.g. vegetarians, pescetarians, or if you don’t eat red meat, fish, shellfish, pork, or lamb - and personalize your menu each week based on your preferences. All of our boxes are assembled in the same processing facility, so we don\'t recommend ordering Blue Apron if you have a serious food allergy.',
        ]);
        factory(\App\Faq::class)->create([
            'title_ar' => 'متى تُقدم؟',
            'content_ar' => 'نُقدم في جميع أيام الأسبوع السبعة في معظم المواقع.',
            'title_en' => 'When do you deliver?',
            'content_en' => 'We deliver all 7 days of the week in most locations.',
        ]);
        factory(\App\Faq::class)->create([
            'title_ar' => 'اين تُقدم؟',
            'content_ar' => 'تُقدم في محافظة القصيم و المواقع المجاورة لها في المملكة العربية السعودية.',
            'title_en' => 'Where do you deliver?',
            'content_en' => 'We deliver to all locations in the continental United States.',
        ]);
        factory(\App\Faq::class)->create([
            'title_ar' => 'اي هي مصادر المكونات ؟',
            'content_ar' => 'إن جودة ونضارة مكوناتنا مهمة للغاية بالنسبة لنا ، لذا فنحن نعمل مباشرة مع مزودي الحرفيين ومئات المزارع العائلية التي تدعم الممارسات المستدامة.',
            'title_en' => 'Where do you source your ingredients?',
            'content_en' => ' The quality and freshness of our ingredients are incredibly important to us, so we work directly with artisanal purveyors and hundreds of family-run farms that support sustainable practices.',
        ]);
        factory(\App\Faq::class)->create([
            'title_ar' => 'هل يمكنني إلغاء التسليم في أسبوع معين؟',
            'content_ar' => 'نعم ، يمكنك إلغاء أي تسليم حتى تتم معالجة الطلب. يمكنك إدارة عمليات التسليم مباشرة في حسابك.',
            'title_en' => 'Can I skip my delivery for a particular week?',
            'content_en' => 'Yes, you can skip any delivery until the order is processed. You can manage your deliveries directly in your account.',
        ]);
        factory(\App\Faq::class)->create([
            'title_ar' => 'هل أحتاج إلى أن أكون في المنزل لقبول التسليم؟',
            'content_ar' => 'صناديقنا المبردة مع حزم الثلج والبطانات معزولة لضمان المكونات الخاصة بك لتبقى طازجة لليوم التسليم كامل ، حتى لو لم تكن في المنزل لقبول التسليم.',
            'title_en' => 'Do I need to be home to accept my delivery?',
            'content_en' => 'Our refrigerated boxes are packed with ice packs and insulated liners to ensure your ingredients will stay fresh for the full delivery day, even if you’re not at home to accept the delivery.',
        ]);
    }
}
