==================================================
디어스 치과 - 진료 칼럼 Latest 스킨
==================================================

[설치 방법]
1. 이 폴더(column)를 그누보드 /skin/latest/ 폴더에 업로드합니다.
   경로: /skin/latest/column/

2. 페이지에서 다음과 같이 호출합니다:
   <?php echo latest('column', '게시판아이디', 6, 40); ?>

   - 'column': 스킨명
   - '게시판아이디': 연동할 게시판 테이블명
   - 6: 출력할 글 개수
   - 40: 제목 글자수 제한


[카테고리 설정]
게시판 카테고리 이름과 data-category 매핑:
- '임플란트'   => 'implant'
- '심미 치료'  => 'aesthetic'
- '치아 교정'  => 'orthodontic'
- '성장기 교정' => 'growth'

게시판 관리에서 위 카테고리명으로 설정하면
자동으로 탭 필터링이 작동합니다.


[필요 라이브러리]
- Swiper 12 (모바일 슬라이드용)
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

- GSAP + ScrollTrigger (스크롤 애니메이션, 선택사항)
  <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/ScrollTrigger.min.js"></script>


[CSS 변수 필요]
common.css에 다음 변수가 정의되어 있어야 합니다:
--primary: #f1693a
--gray-800: #999999
--gray-900: #333333


[이미지 경로]
- img/arrow02.svg        - 화살표 아이콘 (G5_THEME_URL/img/)
- img/column_body.jpg    - 기본 썸네일 이미지
- img/m/column_prev.svg  - 모바일 이전 화살표
- img/m/column_next.svg  - 모바일 다음 화살표


[디자인 특징]
- index.html의 .main_column 섹션 디자인과 동일
- PC: flex 그리드 레이아웃
- 모바일: Swiper 슬라이드 + prev/next 네비게이션
- pc_con / m_con 반응형 토글 패턴 사용
- GSAP가 있으면 스크롤 애니메이션 자동 적용
- 카테고리 탭 클라이언트사이드 필터링


[주의사항]
- common.css가 먼저 로드되어야 합니다
- 모바일에서 .m_column_wrap 배경색(#e9e8e6) 적용
- 썸네일이 없는 글은 기본 이미지가 표시됩니다
