# 급식 API [meal_api.php]

## 개요
전국 초중고등학교의 조식, 중식, 석식 급식 정보를 NEIS로부터 파싱하여 JSON 형태로 출력하는 PHP로 작성된 API

## 대상
NEIS에 등록되어 있는 전국의 초등학교, 중학교, 고등학교

## 사용
GET으로 받아 사용

GET/POST| | |
:---|:---|:---
GET|countryCode|교육청 코드|
GET|schulCode|학교코드|
GET|insttNm|학교이름|
GET|schulCrseScCode|학교종류코드|
GET|schMmealScCode|급식종류코드|
GET|schYmd|날짜|

- 기본 URL : [http://juneyoung.kr/api/school-meal/meal_api.php](http://juneyoung.kr/api/school-meal/meal_api.php)<br>
- 예시 URL : [http://juneyoung.kr/api/school-meal/meal_api.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2](http://juneyoung.kr/api/school-meal/meal_api.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2)

## 세부 사항

- meal_api.php
    - 정의 : 현재 나이스에 등록되어 있는 급식 데이터를 파싱합니다.
    - URL : [http://juneyoung.kr/api/school-meal/meal_api.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2](http://juneyoung.kr/api/school-meal/meal_api.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2)
    - Parameter : countryCode, schulCode, insttNm, schulCrseScCode, schMmealScCode
    - Output : Json 출력(교육청 코드. 학교코드, 학교이름, 학교종류코드, 급식종류코드, 날짜, 급식데이터)
    - 기타 : meal_api.php는 UTC 기준 시간으로 9시간의 시차가 발생합니다. 이를 수정하기 위해서는 meal_api_today.php를 사용하세요.

- meal_api_custom.php
    - 정의 : 해당 날짜에 나이스에 등록되어 있는 급식 데이터를 파싱합니다.
    - URL : [http://juneyoung.kr/api/school-meal/meal_api_custom.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2&schYmd=2018.03.05](http://juneyoung.kr/api/school-meal/meal_api_custom.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2&schYmd=2018.03.05)
    - Parameter : countryCode, schulCode, insttNm, schulCrseScCode, schMmealScCode, schYmd
    - Output : Json 출력(교육청 코드. 학교코드, 학교이름, 학교종류코드, 급식종류코드, 선택한 날짜, 급식데이터)

- meal_api_today.php
    - 정의 : 현재 나이스에 등록되어 있는 오늘의 급식 데이터를 파싱한 후 meal.json 파일을 생성합니다.
    - URL : [http://juneyoung.kr/api/school-meal/meal_api_today.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2](http://juneyoung.kr/api/school-meal/meal_api_today.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2)
    - Parameter : countryCode, schulCode, insttNm, schulCrseScCode, schMmealScCode
    - Output : Json 파일(교육청 코드. 학교코드, 학교이름, 학교종류코드, 급식종류코드, 오늘 날짜, 급식데이터)
    - 기타 : meal_api_today.php와 meal_api_tomorrow.php, meal_api_output.php는 서버에 meal.json이라는 파일을 생성하고 화면상에는 아무 것도 표시되지 않습니다.

- meal_api_tomorrow.php
    - 정의 : 현재 나이스에 등록되어 있는 내일의 급식 데이터를 파싱한 후 meal.json 파일을 생성합니다.
    - URL : [http://juneyoung.kr/api/school-meal/meal_api_tomorrow.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2](http://juneyoung.kr/api/school-meal/meal_api_tomorrow.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2)
    - Parameter : countryCode, schulCode, insttNm, schulCrseScCode, schMmealScCode
    - Output : Json 파일(교육청 코드. 학교코드, 학교이름, 학교종류코드, 급식종류코드, 내일 날짜, 급식데이터)
    - 기타 : meal_api_today.php와 meal_api_tomorrow.php, meal_api_output.php는 서버에 meal.json이라는 파일을 생성하고 화면상에는 아무 것도 표시되지 않습니다.

- meal_api_output.php
    - 정의 : 현재 나이스에 등록되어 있는 급식 데이터를 파싱한 후 meal.json 파일을 생성합니다.
    - URL : [http://juneyoung.kr/api/school-meal/meal_api_output.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2](http://juneyoung.kr/api/school-meal/meal_api_output.php?countryCode=stu.goe.go.kr&schulCode=J100004922&insttNm=교하고등학교&schulCrseScCode=4&schMmealScCode=2)
    - Parameter : countryCode, schulCode, insttNm, schulCrseScCode, schMmealScCode
    - Output : Json 파일(교육청 코드. 학교코드, 학교이름, 학교종류코드, 급식종류코드, 날짜, 급식데이터)
    - 기타 : meal_api_today.php와 meal_api_tomorrow.php, meal_api_output.php는 서버에 meal.json이라는 파일을 생성하고 화면상에는 아무 것도 표시되지 않습니다. meal_api_output.php는 UTC 기준 시간으로 9시간의 시차가 발생합니다. 이를 수정하기 위해서는 meal_api_today.php를 사용하세요.

### 교육청 코드(countryCode=)
- 서울시 교육청 : stu.sen.go.kr
- 경기도 교육청 : stu.goe.go.kr
- 강원도 교육청 : stu.kwe.go.kr
- 전라남도 교육청 : stu.jne.go.kr
- 전라북도 교육청 : stu.jbe.go.kr
- 경상남도 교육청 : stu.gne.go.kr
- 경상북도 교육청 : stu.kbe.go.kr
- 부산광역시 교육청 : stu.pen.go.kr
- 제주자치도 교육청 : stu.jje.go.kr
- 충청남도 교육청 : stu.cne.go.kr
- 충청북도 교육청 : stu.cbe.go.kr
- 광주광역시 교육청 : stu.gen.go.kr
- 울산광역시 교육청 : stu.use.go.kr
- 대전광역시 교육청 : stu.dje.go.kr
- 인천광역시 교육청 : stu.ice.go.kr
- 대구광역시 교육청 : stu.dge.go.kr

### 학교코드(schulCode=)
영어+숫자, 총 10글자로 된 학교 코드는 아래의 링크에서 확인<br>
[https://www.meatwatch.go.kr/biz/bm/sel/schoolListPopup.do](https://www.meatwatch.go.kr/biz/bm/sel/schoolListPopup.do)

### 학교종류코드(schulCrseScCode=)
- 유치원 : 1
- 초등학교 : 2
- 중학교 : 3
- 고등학교 : 4

### 급식종류코드(schMmealScCode=)
- 조식 : 1
- 중식 : 2
- 석식 : 3

### 날짜(schYmd=)
- 예시 : 2018.01.01

## 출력
```json
{
    "교육청 코드": "stu.goe.go.kr",
    "학교 코드": "J100004922",
    "학교 명": "교하고등학교",
    "학교 종류": "고등학교",
    "급식 종류": "중식",
    "날짜": "2018.01.30",
    "메뉴": "오늘은 급식이 없습니다."
}
```

## 개발자
Juneyoung KANG <juneyoung@juneyoung.kr>