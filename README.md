# LUVIA 피부과 웹사이트 – WordPress 커스텀 테마 개발

## 프로젝트 개요 (Overview)

- 본 프로젝트는 가상의 피부과 브랜드 ‘LUVIA’ 웹사이트에 적용하기 위해 WordPress용 커스텀 테마를 PHP로 처음부터 직접 개발한 프로젝트입니다.
- 기존 테마를 수정하는 방식이 아닌 WordPress Theme Hierarchy를 기반으로 테마 구조를 직접 설계하고 구현했으며, 브랜드 아이덴티티를 반영한 UI와 동적 콘텐츠 관리가 가능한 구조를 구축하는 데 중점을 두었습니다.
- 또한 사용자 친화적인 인터페이스와 반응형 웹 환경을 고려하여 다양한 디바이스에서도 일관된 사용자 경험을 제공할 수 있도록 구현했습니다.

---

## 문제 정의 (As-Is)

- 기존 테마 의존 구조의 한계
    - 기존 WordPress 테마는 범용적으로 설계되어 있어 브랜드 고유의 아이덴티티를 충분히 반영하기 어려움
    - 불필요한 기능 및 구조로 인해 사이트 목적에 최적화된 설계가 어려움
- 테마 구조에 대한 이해 부족 문제
    - WordPress 테마가 어떤 구조로 동작하는지에 대한 이해 없이는 유지보수 및 확장에 한계 존재
    - 동적 콘텐츠 출력 및 템플릿 구조 설계 경험 필요
- 브랜드 맞춤 UI 구현의 어려움
    - 기존 테마 기반 커스터마이징으로는 완전한 UI 제어에 제약 존재
    - 브랜드 아이덴티티를 반영한 일관된 디자인 구현의 한계
- 동적 콘텐츠 관리 구조 필요
    - 정적 HTML 중심 구조는 WordPress의 콘텐츠 관리 장점을 충분히 활용하기 어려움
    - 관리자가 콘텐츠를 쉽게 수정하고 관리할 수 있는 구조 필요

---

## 해결 전략 (To-Be)

- WordPress 커스텀 테마 직접 개발
    - WordPress Theme Hierarchy를 기반으로 테마 구조 설계
    - PHP를 활용하여 템플릿 파일 및 기능 직접 구현
- 동적 콘텐츠 출력 구조 구현
    - WordPress Loop 및 Template 파일을 활용한 콘텐츠 동적 출력
    - WordPress 내장 기능을 활용한 효율적인 콘텐츠 관리 구조 구축
- WordPress 기능 활용 및 구조 최적화
    - functions.php를 활용한 테마 기능 구성
    - enqueue 시스템을 활용한 CSS 및 JavaScript 관리
- 브랜드 아이덴티티 반영 UI 구현
    - LUVIA 브랜드 컨셉에 맞춘 UI 및 레이아웃 설계
    - 사용자 경험을 고려한 직관적인 인터페이스 구현
- 외부 API 연동
    - Kakao Maps API를 활용한 위치 정보 지도 기능 구현
    - 실제 서비스 환경을 고려한 기능 확장 경험 확보
- 반응형 웹 구현
    - Desktop, Tablet, Mobile 환경을 고려한 반응형 웹사이트 구현
    - 다양한 디바이스 환경에서 일관된 사용자 경험 제공

---

## 사용 기술 (Tech Stack)

- Frontend
    - HTML5
    - SCSS
    - JavaScript (ES6)
    - Swiper.js
- Backend
    - PHP
    - WordPress
- API Integration
    - Kakao Maps API

---

## 주요 구현 기능 (Key Features)

- WordPress Theme Hierarchy 기반 커스텀 테마 직접 개발
- PHP를 활용한 WordPress 템플릿 구조 설계 및 구현
- 동적 콘텐츠 출력 기능 구현
- WordPress enqueue 시스템을 활용한 스크립트 및 스타일 관리
- WordPress Customizer를 활용한 테마 설정 기능 구현
- Kakao Maps API 연동을 통한 지도 기능 구현
- Swiper.js를 활용한 인터랙티브 슬라이더 구현
- 반응형 웹 디자인 구현

---

## 기대 효과 (Expected Outcomes)

- WordPress 커스텀 테마 개발 전 과정에 대한 이해도 향상
- PHP 기반 WordPress 동적 구조 설계 및 구현 역량 강화
- WordPress Theme Hierarchy 구조에 대한 실무 수준 이해 확보
- 브랜드 맞춤형 웹사이트 구현 경험 확보
- 외부 API 연동 및 실무 환경 대응 능력 향상
- 유지보수 및 확장이 가능한 WordPress 테마 개발 역량 확보
  
---

## 프로젝트 구조
<img width="669" height="850" alt="Frame 276" src="https://github.com/user-attachments/assets/b4bffa4c-6fed-42a4-9300-b95cefc81357" />



  
