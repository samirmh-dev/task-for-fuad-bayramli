# Layihənin təsviri
Flight və hotel üzrə axtarış edən kiçik bir layihəni həyata keçirməlisiniz. Layihə 3 səhifədən ibarətdir:
 - Axtarış səhifəsi
 - Flight nəticələri
 - Hotel nəticələri

Hər hansı bir sualınız yaranarsa repository-də `issue` yaradaraq bizə müraciət edə bilərsiniz.

# Ümumi təsvir
 - Layihənin front fayllarını (html, css, js və s.) bu repodan əldə edə bilərsiniz
 - İdarəetmə paneli üçün nümunə template fayllarını bu repodan əldə edə bilərsiniz. (İstəyinizdən asılı olaraq həmin idarəetmə paneli template-ni istifadə edib etməmək sizin qərarınızdır)
- Zəhmət olmasa Laravel Framework, MySQL (və ya PostgreSQL, MariaDB) istifadə edin. 
- Repozitoriyanı clone edin. Hər tapşırığı bitirdikdən sonra, dəyişiklikləri elə bu repository-ə commit etməyi unutmayın.
- Proyektin içərisində database yaratmaq üçün SQL script və ya migrasiya scripti olmalıdır. Layihə üçün database cədvəl strukturunu özünüz yaratmalısınız. (Miqrasiyalardan istifadə etməyiniz sizin üçün üstünlükdür)
- Layihəni başlatmaq üçün təlimatı INSTALL.MD yazmaq unutmayın.
- Bütün PHP asılılıqları “composer”-in köməyi ilə yüklənməlidir (bu halda composer.json repozitoriyaya əlavə etməyi unutmayın)
- Kodun təmizliyinə böyük önəm verilir. Həmçinin kodlaşdırma zamanı kommentlərdən istifadə etməyiniz sizin üçün üstünlükdür.
- Kodlaşdırma zamanı təhlükəsizlik məsələlərinə nəzər yetirməlisiniz. (CSRF, GoogleReCaptcha)

# Idarəetmə paneli

 - İdarəetmə paneli ayrıca hazırlanmalıdır. 
 - İdarəetmə panelindən `Flight`, `Hotel` əlavə edilə, redaktə edilə və ya silinə bilər.  - 
 - İdarəetmə paneli üçün login səhifəsi əlavə edilməlidir. 
 - Həmçinin login səhifəsi  Google ReCaptcha ilə təhlükəsizliyi bərpa edilməlidir. 
 - İdarəetmə panelində logout funksionallığı olmalıdır. 
 - Flight bölməsi üçün tələb olunan bloklar 
	 - Uçuşu həyata keçirən şirkətin adı (string)
	 - Təyyarənin tipi (string)
	 - Təxmini eniş tarixi (datetime)
	 - Qiymət (float)
	 - Təyinat nöqtəsi (string)
	 - Çıxış nöqtəsi (string)
	 - İnsan sayı (numeric)
	 - Qısa məzmun
		
  - Hotels bölməsi üçün tələb olunan  bloklar
	- Hotelin adı (string)
	- Ulduz sayı (numeric, max 5) (bu say front hissədə ulduzlar ilə göstərilməlidir)
	- Şəhər (string)
	- Xəritədə ünvan (string)
	- Qiymət (float)
	- Qısa məzmun (string)
	- Şəkil üçün upload (dropzone istifadə etməyiniz tələb olunur)

Yuxarıda qeyd edilən bölmələr dinamik şəkildə idarəetmə panelində dəyişdirilə bilməlidir.

# Səhifə 1 - Axtarış səhifəsi
Bu səhifədə daxil edilən məlumatlar üzrə verilənlər bazasından axtarış ediləcək və müvaffiq view (flight-result və ya hotel-result) göstərilməlidir.
- Flight search
Bu bölmədə `From` və  `To` bloklarındakı data nisbidir. Yəni verilənlər bazasında bu fieldlərin dəyərlərinə oxşar nəticələr əldə edilməlidir.
Həmçinin `Departure` və `Return` tarixlərinə uyğun və `Adults` blokuna uyğun nəticələr emal edilməlidir.

- Hotel search
Bu bölmədə Hotellər üzrə qeyd edilən şəhərə uyğun Hotellərin siyahısı göstərilməlidir. (bu bölmədə də `City` bloku nisbidir)
Həmçinin bu bölmədə də `Flights search` blokunda qeyd edildiyi kimi `Departure`, `Return`, `Rooms` üzrə nəticələr emal edilməlidir.

# Səhifə 2 - Flight nəticələri
Bu səhifədə `Axtarış səhifəsində` qeyd edilən məlumatlara uyğun nəticələr göstərilməlidir (`Airline name`, `Price`, `Plane type`, `Estimate Arrival datetime`, `Short description`). 
Səhifədə pagination əlavə edilməlidir. (hər səhifə üzrə nəticə sayını təyin etmək sizə tapşırılır)

# Səhifə 3 - Hotel nəticələri
Bu səhifədə də həmçinin Hotel axtarışına uyğun olan nəticələr göstərilməlidir. 

Göstərilməsi vacib olan bölmələrin siyahısı: 

 1. Hotelin ulduz sayı
 2. Yerləşdiyi ərazi
 3. Xəritəyə keçid linki
 4. Şəkil (əgər 1 şəkil əlavə edilibsə şəkilin özünü, bir neçə şəkil əlavə edilibsə slider formasında əlavə edilməlidir)
 5. Qiymət
 6. Qısa məzmun
 7. Hotelin təklif etdiyi imkanlar (Wifi, Bar, Air Conditioner, Restaurant, Gym, Room service,  Cafe)
 
 Həmçinin bu bölmədə də səhifələmə əlavə edilməlidir.
