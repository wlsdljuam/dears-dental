==================================================
디어스 치과 - 진료 칼럼 Latest 스킨
==================================================

[설치 방법]
1. 이 폴더(column)를 그누보드 /skin/latest/ 폴더에 업로드합니다.
   경로: /skin/latest/column/

2. 관리자 페이지에서 최신글 설정 시 스킨을 'column'으로 선택합니다.

3. 메인 페이지에서 다음과 같이 호출합니다:
   <?php echo latest('column', '게시판아이디', 6, 40); ?>

   - 'column': 스킨명
   - '게시판아이디': 연동할 게시판 테이블명 (예: 'notice', 'column' 등)
   - 6: 출력할 글 개수
   - 40: 제목 글자수 제한


[카테고리 설정]
게시판 카테고리 이름과 data-category 매핑:
- '임플란트' => 'implant'
- '심미 치료' => 'aesthetic'
- '치아 교정' => 'orthodontic'
- '성장기 교정' => 'growth'

게시판 관리에서 위 카테고리명으로 카테고리를 설정하면
자동으로 탭 필터링이 작동합니다.


[필요 라이브러리]
- Swiper.js (모바일 슬라이드용)
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


[CSS 변수 필요]
테마의 CSS에 다음 변수가 정의되어 있어야 합니다:
--primary: 메인 컬러
--gray-600: 회색 텍스트
--gray-800: 진한 회색 텍스트
--gray-900: 가장 진한 텍스트


[이미지 경로]
- arrow02.svg: 화살표 아이콘 (G5_THEME_URL/img/ 폴더에 위치)
- column_body.jpg: 기본 썸네일 이미지 (썸네일 없을 때 표시)


[주의사항]
- 썸네일 이미지가 없는 글은 기본 이미지(column_body.jpg)가 표시됩니다.
- 모바일에서는 Swiper 슬라이드로 작동합니다.
- PC에서는 그리드 레이아웃으로 표시됩니다.