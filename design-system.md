# 디어스치과 디자인 시스템

> Figma 파일에서 직접 추출한 공식 디자인 토큰

## 개요
- **프로젝트명**: 디어스치과 UXUI
- **Figma 파일 ID**: XkIJwbk6arMp9yfQ3J5web
- **최종 수정일**: 2026-01-02

---

## 1. 컬러 시스템 (Figma Fill Styles)

### Color Tokens

| Style ID | 토큰명 | HEX | RGB | 용도 |
|----------|--------|-----|-----|------|
| `27:41` | `--color-bg` | `#F5F4F1` | rgb(245, 244, 241) | 메인 배경색 |
| `27:42` | `--color-white` | `#FFFFFF` | rgb(255, 255, 255) | 흰색 배경, GNB 배경 |
| `27:43` | `--color-gray-900` | `#333333` | rgb(51, 51, 51) | 메인 텍스트 |
| `27:44` | `--color-gray-800` | `#999999` | rgb(153, 153, 153) | 보조 텍스트, 캡션 |
| `27:46` | `--color-gray-700` | `#CDCDCD` | rgb(205, 205, 205) | 구분선, 테두리 |

### 추가 컬러 (프레임에서 추출)

| HEX | RGB | 용도 |
|-----|-----|------|
| `#050505` | rgb(5, 5, 5) | 다크 배경 (배너) |
| `#009ACE` | rgb(0, 154, 206) | 포인트 컬러 (블루) |
| `#222222` | rgb(34, 34, 34) | 강조 텍스트 |
| `#F1693A` | rgb(241, 105, 58) | 포인트 컬러 (오렌지) - 활성 메뉴 |

### CSS 변수 정의

```css
:root {
    /* Figma Color Styles */
    --color-bg: #F5F4F1;
    --color-white: #FFFFFF;
    --color-gray-900: #333333;
    --color-gray-800: #999999;
    --color-gray-700: #CDCDCD;

    /* Additional Colors */
    --color-black: #222222;
    --color-dark: #050505;
    --color-primary: #F1693A; /* 오렌지 - 활성 메뉴 */
}
```

---

## 2. 타이포그래피 (Figma Text Styles)

### 폰트 패밀리
```css
font-family: 'Pretendard', -apple-system, BlinkMacSystemFont, system-ui, sans-serif;
```

### Text Style Tokens

| Style ID | 토큰명 | 크기 | 굵기 | 행간 | 자간 |
|----------|--------|------|------|------|------|
| `270:8` | `kor/title/56-regular` | 56px | 400 | 140% | -2.24px |
| `27:50` | `kor/title/22-regular` | 22px | 400 | 148% | -0.88px |
| `27:40` | `kor/body/28-regular` | 28px | 400 | 148% | -1.12px |
| `41:47` | `kor/body/18-regular` | 18px | 400 | 148% | -0.72px |
| `68:523` | `kor/body/12-regular` | 12px | 400 | 148% | -0.48px |

### CSS 클래스 정의

```css
/* Title Styles */
.t56r {
    font-family: 'Pretendard', sans-serif;
    font-size: 56px;
    font-weight: 400;
    line-height: 140%;
    letter-spacing: -2.24px;
}

.t36r {
    font-family: 'Pretendard', sans-serif;
    font-size: 36px;
    font-weight: 400;
    line-height: 140%;
    letter-spacing: -2px;
}

.t28r {
    font-family: 'Pretendard', sans-serif;
    font-size: 28px;
    font-weight: 400;
    line-height: 148%;
    letter-spacing: -1.12px;
}

.t22r {
    font-family: 'Pretendard', sans-serif;
    font-size: 22px;
    font-weight: 400;
    line-height: 148%;
    letter-spacing: -0.88px;
}

.t20r {
    font-family: 'Pretendard', sans-serif;
    font-size: 20px;
    font-weight: 400;
    line-height: 140%;
    letter-spacing: -1px;
}

/* Body Styles */
.b18r {
    font-family: 'Pretendard', sans-serif;
    font-size: 18px;
    font-weight: 400;
    line-height: 148%;
    letter-spacing: -0.72px;
}

.b16r {
    font-family: 'Pretendard', sans-serif;
    font-size: 16px;
    font-weight: 400;
    line-height: 162%;
    letter-spacing: -0.5px;
}

.b16s {
    font-family: 'Pretendard', sans-serif;
    font-size: 16px;
    font-weight: 600;
    line-height: 162%;
    letter-spacing: -0.5px;
}

.b14r {
    font-family: 'Pretendard', sans-serif;
    font-size: 14px;
    font-weight: 400;
    line-height: 143%;
    letter-spacing: -0.5px;
}

.b14s {
    font-family: 'Pretendard', sans-serif;
    font-size: 14px;
    font-weight: 600;
    line-height: 143%;
    letter-spacing: -1px;
}

/* Caption Style */
.c12r {
    font-family: 'Pretendard', sans-serif;
    font-size: 12px;
    font-weight: 400;
    line-height: 148%;
    letter-spacing: -0.48px;
}
```

---

## 3. 레이아웃 그리드 (Figma Layout Grid)

### Grid System
```
Pattern: COLUMNS
Columns: 9
Column Width: 181.33px
Gutter: 16px
Margin (Offset): 80px
Total Width: 1920px
Content Width: 1760px (1920 - 80*2)
```

### Container Widths

| 토큰명 | 값 | 용도 |
|--------|---|------|
| `--container-full` | 1920px | 전체 너비 프레임 |
| `--container-content` | 1760px | 콘텐츠 영역 |
| `--container-center` | 1344px | 중앙 정렬 콘텐츠 |
| `--container-header` | 1712px | 헤더 너비 |

### CSS 정의

```css
:root {
    /* Container */
    --container-full: 1920px;
    --container-content: 1760px;
    --container-center: 1344px;
    --container-header: 1712px;

    /* Grid */
    --grid-columns: 9;
    --grid-gutter: 16px;
    --grid-margin: 80px;
    --grid-column-width: 181.33px;
}

.center {
    max-width: var(--container-center);
    width: 100%;
    margin: 0 auto;
    padding: 0 20px;
}
```

---

## 4. 여백 시스템 (Spacing)

### Spacing Scale

```css
:root {
    --spacing-4: 4px;
    --spacing-8: 8px;
    --spacing-12: 12px;
    --spacing-16: 16px;
    --spacing-20: 20px;
    --spacing-24: 24px;
    --spacing-32: 32px;
    --spacing-40: 40px;
    --spacing-48: 48px;
    --spacing-50: 50px;
    --spacing-60: 60px;
    --spacing-80: 80px;
    --spacing-100: 100px;
    --spacing-120: 120px;
}
```

---

## 5. 컴포넌트 스타일

### GNB (Global Navigation Bar)

```css
/* GNB Default */
.gnb {
    width: 100%;
    height: 73px;
    background-color: transparent;
    padding: 15px 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* GNB Hover State */
.gnb:hover,
.gnb.active {
    background-color: var(--color-white);
}

/* Floating Header */
.header {
    position: fixed;
    top: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 102;
}

.hd_wrap {
    max-width: 1712px;
    height: 60px;
    border-radius: 99px;
    background-color: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(40px);
    box-shadow: 0px 15px 30px rgba(0, 0, 0, 0.15);
    padding: 0 16px;
}
```

### 네비게이션 메뉴

```css
.hd_menu a {
    color: #fff;
    font-size: 16px;
    font-weight: 400;
    padding: 0 16px;
    line-height: 38px;
    border-radius: 99px;
    transition: all 0.2s;
}

.hd_menu a:hover {
    background-color: #333;
}

.hd_menu a.active {
    background-color: #fff;
    color: #222;
}
```

### GNB 변형 (Figma node-id: 825-13)

#### 변형 1: 메인 페이지 GNB (node-id: 315-2274)
- **배경**: 투명 → 스크롤/호버 시 흰색
- **메뉴 텍스트**: 흰색 → 스크롤/호버 시 #333333
- **활성 메뉴**: #F1693A (오렌지)
- **메뉴 항목**: 디어스치과, 의료진 소개, 사랑니 발치, 턱관절 진료, 진료 철학, 치료 전후, 오시는 길

#### 변형 2: 임플란트 페이지 GNB (node-id: 825-13)
- **배경**: 투명 → 스크롤/호버 시 흰색
- **메뉴 텍스트**: 흰색 → 스크롤/호버 시 #333333
- **활성 메뉴**: #F1693A (오렌지)
- **메뉴 항목**: 디어스치과, 임플란트/왜 디어스인가?(드롭다운), 원데이 임플란트, 디어네이트(로고 포함), 치아 교정, 일반 진료

```css
/* GNB State Transitions */
.header {
    transition: all 0.3s;
}

.hd_wrap {
    background-color: transparent;
    transition: all 0.3s;
}

/* Hover/Scroll State */
.header.scrolled .hd_wrap,
.header:hover .hd_wrap {
    background-color: var(--color-white);
    box-shadow: 0 2px 20px rgba(0,0,0,0.1);
}

.header.scrolled .hd_menu > li > a,
.header:hover .hd_menu > li > a {
    color: var(--color-gray-900);
}

.header.scrolled .hd_menu li a.active,
.header:hover .hd_menu li a.active {
    color: var(--color-primary); /* #F1693A */
}

/* Diernate Logo in Menu */
.hd_menu .diernate-logo {
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.hd_menu .diernate-logo svg {
    height: 16px;
}

/* Submenu Indicator */
.hd_menu .has-submenu > a::after {
    content: '';
    border-left: 4px solid transparent;
    border-right: 4px solid transparent;
    border-top: 5px solid currentColor;
    margin-left: 4px;
}
```

### 퀵 메뉴

```css
.quick_menu {
    position: fixed;
    width: 72px;
    display: flex;
    flex-direction: column;
}
```

### 푸터

```css
.footer {
    background-color: var(--color-white);
    padding: 80px 0;
}

.footer_left {
    width: 800px;
}

.footer_map {
    width: 960px;
    height: 960px;
}
```

---

## 6. 효과 (Effects)

### Shadow

```css
:root {
    --shadow-header: 0px 15px 30px rgba(0, 0, 0, 0.15);
    --shadow-card: 0px 4px 20px rgba(0, 0, 0, 0.1);
    --shadow-button: 0px 2px 8px rgba(0, 0, 0, 0.12);
}
```

### Blur

```css
:root {
    --blur-header: blur(40px);
}
```

### Transition

```css
:root {
    --transition-fast: 0.2s ease;
    --transition-normal: 0.3s ease;
    --transition-slow: 0.5s ease;
}
```

---

## 7. Border Radius

```css
:root {
    --radius-sm: 4px;
    --radius-md: 8px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --radius-full: 99px;
}
```

---

## 8. 반응형 브레이크포인트

```css
/* Desktop XL */
@media (max-width: 1920px) { }

/* Desktop */
@media (max-width: 1440px) { }

/* Tablet Landscape */
@media (max-width: 1024px) { }

/* Tablet Portrait */
@media (max-width: 768px) { }

/* Mobile */
@media (max-width: 480px) { }
```

---

## 9. 전체 CSS 변수 정의

```css
:root {
    /* ===== COLORS ===== */
    /* Figma Fill Styles */
    --color-bg: #F5F4F1;
    --color-white: #FFFFFF;
    --color-gray-900: #333333;
    --color-gray-800: #999999;
    --color-gray-700: #CDCDCD;

    /* Additional Colors */
    --color-black: #222222;
    --color-dark: #050505;
    --color-primary: #009ACE;

    /* ===== TYPOGRAPHY ===== */
    --font-family: 'Pretendard', -apple-system, BlinkMacSystemFont, system-ui, sans-serif;

    /* Font Sizes */
    --font-size-56: 56px;
    --font-size-36: 36px;
    --font-size-28: 28px;
    --font-size-22: 22px;
    --font-size-20: 20px;
    --font-size-18: 18px;
    --font-size-16: 16px;
    --font-size-14: 14px;
    --font-size-12: 12px;

    /* Line Heights */
    --line-height-140: 140%;
    --line-height-148: 148%;
    --line-height-162: 162%;

    /* Letter Spacing */
    --letter-spacing-tight: -2.24px;
    --letter-spacing-normal: -1.12px;
    --letter-spacing-loose: -0.48px;

    /* ===== LAYOUT ===== */
    /* Container */
    --container-full: 1920px;
    --container-content: 1760px;
    --container-center: 1344px;
    --container-header: 1712px;

    /* Grid */
    --grid-columns: 9;
    --grid-gutter: 16px;
    --grid-margin: 80px;

    /* ===== SPACING ===== */
    --spacing-4: 4px;
    --spacing-8: 8px;
    --spacing-12: 12px;
    --spacing-16: 16px;
    --spacing-20: 20px;
    --spacing-24: 24px;
    --spacing-32: 32px;
    --spacing-40: 40px;
    --spacing-48: 48px;
    --spacing-50: 50px;
    --spacing-60: 60px;
    --spacing-80: 80px;
    --spacing-100: 100px;
    --spacing-120: 120px;

    /* ===== BORDER RADIUS ===== */
    --radius-sm: 4px;
    --radius-md: 8px;
    --radius-lg: 16px;
    --radius-xl: 24px;
    --radius-full: 99px;

    /* ===== EFFECTS ===== */
    /* Shadows */
    --shadow-header: 0px 15px 30px rgba(0, 0, 0, 0.15);
    --shadow-card: 0px 4px 20px rgba(0, 0, 0, 0.1);
    --shadow-button: 0px 2px 8px rgba(0, 0, 0, 0.12);

    /* Blur */
    --blur-header: blur(40px);

    /* Transitions */
    --transition-fast: 0.2s ease;
    --transition-normal: 0.3s ease;
    --transition-slow: 0.5s ease;

    /* ===== Z-INDEX ===== */
    --z-header: 102;
    --z-quick-menu: 100;
    --z-modal: 200;
    --z-tooltip: 300;
}
```

---

## 10. Figma Style ID 매핑

개발 시 Figma 스타일 ID와 CSS 토큰 연결 참조:

| Figma Style ID | CSS Variable | 용도 |
|----------------|--------------|------|
| `27:41` | `--color-bg` | 메인 배경 |
| `27:42` | `--color-white` | 흰색 |
| `27:43` | `--color-gray-900` | 진한 회색 (텍스트) |
| `27:44` | `--color-gray-800` | 중간 회색 (보조 텍스트) |
| `27:46` | `--color-gray-700` | 연한 회색 (구분선) |
| `270:8` | `.t56r` | 56px 타이틀 |
| `27:50` | `.t22r` | 22px 타이틀 |
| `27:40` | `.t28r` | 28px 본문 |
| `41:47` | `.b18r` | 18px 본문 |
| `68:523` | `.c12r` | 12px 캡션 |
