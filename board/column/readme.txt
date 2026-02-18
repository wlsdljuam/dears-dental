==================================================
디어스 치과 - 진료 칼럼 게시판 스킨
==================================================

[파일 구조]
board/column/
├── list.skin.php      - 게시판 목록 (카드 그리드)
├── view.skin.php      - 글 상세보기
├── write.skin.php     - 글 작성/수정
├── comment.skin.php   - 댓글
├── style.css          - 스킨 전용 CSS
└── readme.txt         - 설치 가이드

latest/column/
├── latest.skin.php    - 최신글 위젯 (메인/서브 페이지용)
├── style.css          - Latest 전용 CSS
└── readme.txt


[게시판 스킨 설치]
1. board/column/ 폴더를 그누보드 /skin/board/ 폴더에 업로드
   경로: /skin/board/column/

2. 관리자 > 게시판관리 에서 스킨을 'column'으로 선택

3. 게시판 카테고리 설정:
   임플란트|심미 치료|치아 교정|성장기 교정


[Latest 스킨 설치]
1. latest/column/ 폴더를 그누보드 /skin/latest/ 폴더에 업로드
   경로: /skin/latest/column/

2. 페이지에서 호출:
   <?php echo latest('column', '게시판아이디', 6, 40); ?>

   - 'column': 스킨명
   - '게시판아이디': 연동할 게시판 테이블명
   - 6: 출력할 글 개수
   - 40: 제목 글자수 제한


[카테고리 매핑]
게시판 카테고리 이름이 아래와 일치해야 탭 필터링이 동작합니다:
  '임플란트'   => implant
  '심미 치료'  => aesthetic
  '치아 교정'  => orthodontic
  '성장기 교정' => growth


[필수 라이브러리]
테마의 head.sub.php 또는 해당 페이지에 아래 라이브러리가 로드되어야 합니다:

1. Swiper 12 (모바일 슬라이드):
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />
   <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

2. GSAP + ScrollTrigger (스크롤 애니메이션, 선택사항):
   <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/ScrollTrigger.min.js"></script>

3. Lenis (스무스 스크롤, 선택사항):
   <script src="https://unpkg.com/lenis@1.0.33/dist/lenis.min.js"></script>


[CSS 변수 (common.css에 정의)]
--bg: #f5f4f1
--white: #ffffff
--gray-900: #333333
--gray-800: #999999
--gray-700: #cdcdcd
--black: #222222
--primary: #f1693a
--container-center: 1344px


[이미지 경로]
아래 이미지가 테마 img 폴더에 있어야 합니다:
- img/arrow02.svg          - 화살표 아이콘
- img/column_body.jpg      - 기본 썸네일 (썸네일 없을 때)
- img/m/column_prev.svg    - 모바일 이전 화살표
- img/m/column_next.svg    - 모바일 다음 화살표


[기능 요약]

게시판 스킨 (board):
- 카테고리 탭 필터링 (서버사이드)
- 카드 그리드 레이아웃 (PC 3열, 태블릿 2열, 모바일 Swiper)
- 게시글 검색 (제목/내용)
- 썸네일 자동 추출
- GSAP 스크롤 애니메이션
- 반응형 (1024px / 768px / 480px)
- 글 상세보기: 대표이미지, 본문, 첨부파일, 이전/다음글
- 댓글 시스템

Latest 스킨 (latest):
- 카테고리 탭 필터링 (클라이언트사이드 JS)
- PC: flex 그리드 / 모바일: Swiper 슬라이드
- 모바일 prev/next 네비게이션
- GSAP 스크롤 애니메이션
- pc_con / m_con 반응형 토글 패턴


[반응형 브레이크포인트]
- 1024px: 태블릿 (카드 2열, 타이포 축소)
- 768px:  모바일 (Swiper 전환, m_con 표시, pc_con 숨김)
- 480px:  소형 모바일 (카드 축소, 폰트 축소)


[주의사항]
- common.css가 먼저 로드되어야 CSS 변수와 타이포그래피 클래스가 적용됩니다
- 게시판 스킨의 list.skin.php는 서버사이드 카테고리 필터링 (URL 이동)
- latest.skin.php는 클라이언트사이드 JS 탭 필터링 (AJAX 없이 display 토글)
- 썸네일이 없는 글은 column_body.jpg 기본 이미지가 표시됩니다
