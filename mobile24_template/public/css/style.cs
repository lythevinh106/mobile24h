.list-scroll {
  position: fixed;
  top: 50%;
  transform: translateY(-50%);
  right: 6px;
  z-index: 3;
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 6px;
  color: rgb(51, 51, 51);
  font-size: 14px;
  line-height: 18px;
  padding: 5px;
}
.list-scroll .active {
  background-color: rgb(219, 0, 0);
}
.list-scroll-box {
  width: 85px;
  height: 85px;
  display: block;
  background-color: rgb(255, 255, 255);
  border-color: rgb(255, 212, 0);
  border-radius: 5px;
  border-style: solid;
  border-width: 1px;
  color: rgb(51, 51, 51);
  display: flex;
  justify-content: center;
  font-family: Helvetica;
  font-size: 14px;
  line-height: 18px;
  margin: 0px 0px 3px;
  padding: 10px 5px;
  text-align: center;
  align-items: center;
}

.btn-scroll-top {
  position: fixed;
  bottom: 50px;
  right: 6px;
  z-index: 3;
}
.btn-scroll-top img {
  width: 70px;
  height: auto;
}

.banner-left,
.banner-right {
  position: fixed;
}

.banner-left {
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  z-index: 0;
}

.sale--vnpay {
  background-image: linear-gradient(to right, #3bacf0, #1b6dc1);
  border-radius: 20px;
  color: rgb(40, 138, 214);
  display: flex;
  padding-right: 5px;
  max-width: 120px;
}
.sale--vnpay img {
  display: inline-block;
  width: 22px;
  height: 22px;
  transform: translateY(-0.3px);
}
.sale--vnpay span {
  color: rgb(255, 255, 255);
  display: inline-block;
  font-size: 10px;
  line-height: 13px;
  margin: 0px 0px 0px 3px;
  padding: 4px 0px 0px 3px;
  text-transform: uppercase;
}

.cart--main {
  display: flex;
  justify-content: space-evenly;
}
.cart--main span {
  background-color: #dfa3ee;
  padding: 5px 10px;
  border-radius: 5px;
  font-weight: 600;
}
.cart--main span a {
  color: #ffffff;
  display: inline-block;
  margin-left: 5px;
  font-family: WorkSans;
}
.cart--main span i {
  display: inline-block;
  padding-left: 6px;
}

.overview--btn {
  display: flex;
  justify-content: center;
}
.overview--btn span {
  cursor: pointer;
  padding: 8px 80px;
  background-color: #f3f3f3;
  border-radius: 5px;
}
.overview--btn:hover span {
  background-color: rgb(56, 56, 168);
}

.btn {
  outline: none;
  background-color: transparent;
  border: none;
}

.modal-box {
  display: none;
  z-index: 5;
  box-shadow: #cccccc 0px 4px 8px 0px;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 18px 22px;
  background-color: rgb(255, 255, 255);
  color: #333333;
}
.modal-box h3 {
  color: #333333;
  font-family: Roboto;
  font-size: 20px;
  font-weight: 500;
  line-height: 26px;
  text-align: center;
}
.modal-box__title {
  margin-top: 15px;
  color: #333333;
  font-size: 14px;
}
.modal-box__btn {
  display: flex;
  justify-content: space-evenly;
  margin-top: 15px;
}
.modal-box__btn button {
  font-size: 14px;
  line-height: 16px;
  padding: 10px 20px;
  text-align: center;
}
.modal-box__btn button:nth-child(1) {
  background-color: #eeeeee;
  border-color: #eeeeee;
  border-radius: 4px;
  border-style: solid;
  border-width: 1px;
  color: #212121;
}
.modal-box__btn button:nth-child(2) {
  background-color: #1435c3;
  border-color: #1435c3;
  border-radius: 4px;
  border-style: solid;
  border-width: 1px;
  color: #ffffff;
}

.over-layer {
  position: fixed;
  background-color: rgba(51, 51, 51, 0.6);
  width: 100%;
  height: 100%;
  z-index: 4;
  display: none;
}

.slick-arrow::before {
  color: rgb(255, 210, 0);
}

.slick-prev {
  position: absolute;
  left: 0;
  z-index: 2;
}

.slick-next {
  position: absolute;
  right: 0;
  z-index: 2;
}

@font-face {
  src: url(../font/PetitFormalScript-Regular.ttf);
  font-family: PetitFormal;
}
@font-face {
  src: url(../font/KdamThmorPro-Regular.ttf);
  font-family: KdamThmorPro;
}
@font-face {
  src: url(../font/WorkSans-VariableFont_wght.ttf);
  font-family: WorkSans;
}
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html,
body {
  scroll-behavior: smooth;
}

ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

a {
  text-decoration: none;
  color: black;
  font-family: Arial, Helvetica, sans-serif;
  cursor: pointer;
}

.wrapper {
  position: relative;
}

.header {
  background-color: rgb(255, 210, 0);
}
.header-top {
  padding: 10px 0px 0px;
}
.header-top .row {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}
.header-top__logo {
  width: 17%;
  align-self: center;
}
.header-top__logo img {
  width: 70%;
  height: auto;
  object-fit: cover;
}
.header-top__search {
  box-shadow: rgba(0, 0, 0, 0.16) 0px 4px 6px 0px;
  width: 30%;
  display: flex;
  align-items: center;
  background-color: rgb(255, 255, 255);
  padding: 8px 8px 8px 13px;
  z-index: 5;
}
.header-top__search input {
  width: 80%;
  background-color: rgb(255, 255, 255);
  border-radius: 4px;
  color: rgb(153, 153, 153);
  display: inline-block;
  font-size: 15px;
  line-height: 18px;
  border: none;
  outline: none;
}
.header-top__search ::placeholder {
  font-size: 12px;
  color: #737373;
  font-weight: 700;
}
.header-top__search i {
  width: 20%;
  color: rgb(51, 51, 51);
  display: inline-block;
  font-size: 14px;
  line-height: 30px;
  text-align: center;
}
.header-top__history {
  width: 96px;
  align-items: center;
  color: rgb(51, 51, 51);
  display: flex;
  justify-content: space-between;
  line-height: 18px;
  background-color: rgba(255, 172, 10, 0.6);
  padding: 0px 10px;
}
.header-top__history a {
  border-radius: 4px;
  color: rgb(51, 51, 51);
  display: inline-block;
  font-size: 12px;
  line-height: 14px;
  text-align: center;
}
.header-top__cart {
  position: relative;
  width: 132px;
  color: rgb(51, 51, 51);
  display: flex;
  justify-content: space-between;
  line-height: 18px;
  background-color: rgba(255, 172, 10, 0.6);
  border-radius: 4px;
  display: flex;
  justify-content: space-around;
  align-items: center;
}
.header-top__cart:hover .header-top__cart-detail {
  display: block;
}
.header-top__cart .fa-cart-shopping {
  display: block;
  position: relative;
}
.header-top__cart .fa-cart-shopping .header-top__cart-total {
  position: absolute;
  top: -140%;
  right: -100%;
  font-size: 12px;
  font-weight: 700;
  font-family: Arial, Helvetica, sans-serif;
  background-color: red;
  padding: 5px;
  border-radius: 100%;
  color: white;
}
.header-top__cart__layer-fake {
  position: absolute;
  width: 300%;
  height: 20px;
  top: 100%;
  right: 0;
  background-color: red;
  z-index: 4;
  opacity: 0;
}
.header-top__cart-detail {
  display: none;
  background-color: #fff;
  position: absolute;
  top: 120%;
  right: 0;
  z-index: 3;
  width: 300%;
  min-height: 100px;
  padding: 15px 17px;
  border-radius: 10px;
}
.header-top__cart-detail ul {
  min-height: 300px;
  padding: 0px 0px 20px 0px;
  border-bottom: 1px dotted;
  align-content: flex-start;
}
.header-top__cart-detail li {
  width: 100%;
  display: flex;
  align-items: center;
  margin-top: 15px;
}
.header-top__cart-detail__img {
  width: 20%;
  height: auto;
  max-height: 100px;
}
.header-top__cart-detail__img img {
  width: 100%;
  object-fit: cover;
  padding: 6px;
  border: 1px solid;
  border-radius: 7px;
}
.header-top__cart-detail-main {
  display: flex;
  flex-direction: column;
  margin-left: 15px;
}
.header-top__cart-detail-main__name {
  color: rgb(67, 70, 87);
  display: -webkit-box;
  font-size: 15px;
  line-height: 20px;
}
.header-top__cart-detail-main__name span {
  color: blue;
  font-weight: bold;
}
.header-top__cart-detail-main__number {
  color: rgb(67, 70, 87);
  display: -webkit-box;
  font-size: 15px;
  line-height: 20px;
}
.header-top__cart-detail-main__price {
  color: rgb(51, 51, 51);
  display: inline-block;
  font-size: 15px;
  font-weight: 700;
  line-height: 20px;
}
.header-top__cart-detail-end {
  margin-top: 20px;
  display: flex;
  justify-content: space-between;
}
.header-top__cart-detail-end__number {
  color: #333333;
  font-size: 14px;
  line-height: 26px;
}
.header-top__cart-detail-end__number span {
  color: red;
}
.header-top__cart-detail-end__total {
  color: #333333;
  display: inline-block;
  font-size: 18px;
  font-weight: 500;
  line-height: 26px;
}
.header-top__cart-detail-btn {
  margin-top: 20px;
}
.header-top__cart-detail-btn a {
  display: block;
  text-align: center;
  z-index: 2;
  width: 100%;
  background-color: blue;
  padding: 12px;
  border-radius: unset;
}
.header-top__cart-detail-btn a span {
  color: #fff;
}
.header-top__cart a {
  border-radius: 4px;
  color: rgb(51, 51, 51);
  display: inline-block;
  font-size: 12px;
  font-weight: 700;
  line-height: 14px;
}
.header-top__nav {
  display: flex;
  width: 26%;
  align-self: center;
  justify-content: space-between;
}
.header-top__nav li {
  color: rgb(51, 51, 51);
  font-size: 14px;
  line-height: 18px;
  padding: 0px 12px;
  text-align: center;
  cursor: pointer;
  line-height: 100%;
}
.header-top__nav li:not(:nth-last-child(1)) {
  position: relative;
}
.header-top__nav li:not(:nth-last-child(1)) ::after {
  position: absolute;
  content: "";
  width: 1px;
  height: 200%;
  background-color: white;
  z-index: 1;
  top: -50%;
  left: 100%;
}
.header-main > ul {
  margin-top: 10px;
  padding: 20px 0px 30pxs 0px;
}
.header-main > ul li {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  flex: 1;
  color: rgb(51, 51, 51);
  font-size: 13px;
  font-weight: 500;
  line-height: 18px;
  padding: 20px 0;
}
.header-main > ul li a {
  display: inline-block;
  margin-left: 8px;
  color: #fff;
}
.header-main > ul li i {
  font-size: 14px;
}
.header-main > ul li::before {
  content: "";
  z-index: 2;
  position: absolute;
  left: 0;
  bottom: 15%;
  background-color: rgb(255, 140, 97);
  width: 0px;
  height: 3px;
  border-radius: 12px;
  transition: all 0.3s linear;
}
.header-main > ul li:hover:before {
  width: 100%;
  background-color: #fff;
}
.header-main > ul li .ul-category {
  position: relative;
  width: 100%;
  background-color: red;
  height: 60px;
}

.list-scroll {
  position: fixed;
  top: 50%;
  transform: translateY(-50%);
  right: 6px;
  z-index: 3;
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 6px;
  color: rgb(51, 51, 51);
  font-size: 14px;
  line-height: 18px;
  padding: 5px;
}
.list-scroll .active {
  background-color: rgb(219, 0, 0);
}
.list-scroll-box {
  width: 85px;
  height: 85px;
  display: block;
  background-color: rgb(255, 255, 255);
  border-color: rgb(255, 212, 0);
  border-radius: 5px;
  border-style: solid;
  border-width: 1px;
  color: rgb(51, 51, 51);
  display: flex;
  justify-content: center;
  font-family: Helvetica;
  font-size: 14px;
  line-height: 18px;
  margin: 0px 0px 3px;
  padding: 10px 5px;
  text-align: center;
  align-items: center;
}

.btn-scroll-top {
  position: fixed;
  bottom: 50px;
  right: 6px;
  z-index: 3;
}
.btn-scroll-top img {
  width: 70px;
  height: auto;
}

.banner-left,
.banner-right {
  position: fixed;
}

.banner-left {
  left: 0;
  top: 50%;
  transform: translateY(-50%);
  z-index: 0;
}

.sale--vnpay {
  background-image: linear-gradient(to right, #3bacf0, #1b6dc1);
  border-radius: 20px;
  color: rgb(40, 138, 214);
  display: flex;
  padding-right: 5px;
  max-width: 120px;
}
.sale--vnpay img {
  display: inline-block;
  width: 22px;
  height: 22px;
  transform: translateY(-0.3px);
}
.sale--vnpay span {
  color: rgb(255, 255, 255);
  display: inline-block;
  font-size: 10px;
  line-height: 13px;
  margin: 0px 0px 0px 3px;
  padding: 4px 0px 0px 3px;
  text-transform: uppercase;
}

.cart--main {
  display: flex;
  justify-content: space-evenly;
}
.cart--main span {
  background-color: #dfa3ee;
  padding: 5px 10px;
  border-radius: 5px;
  font-weight: 600;
}
.cart--main span a {
  color: #ffffff;
  display: inline-block;
  margin-left: 5px;
  font-family: WorkSans;
}
.cart--main span i {
  display: inline-block;
  padding-left: 6px;
}

.overview--btn {
  display: flex;
  justify-content: center;
}
.overview--btn span {
  cursor: pointer;
  padding: 8px 80px;
  background-color: #f3f3f3;
  border-radius: 5px;
}
.overview--btn:hover span {
  background-color: rgb(56, 56, 168);
}

.btn {
  outline: none;
  background-color: transparent;
  border: none;
}

.modal-box {
  display: none;
  z-index: 5;
  box-shadow: #cccccc 0px 4px 8px 0px;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 18px 22px;
  background-color: rgb(255, 255, 255);
  color: #333333;
}
.modal-box h3 {
  color: #333333;
  font-family: Roboto;
  font-size: 20px;
  font-weight: 500;
  line-height: 26px;
  text-align: center;
}
.modal-box__title {
  margin-top: 15px;
  color: #333333;
  font-size: 14px;
}
.modal-box__btn {
  display: flex;
  justify-content: space-evenly;
  margin-top: 15px;
}
.modal-box__btn button {
  font-size: 14px;
  line-height: 16px;
  padding: 10px 20px;
  text-align: center;
}
.modal-box__btn button:nth-child(1) {
  background-color: #eeeeee;
  border-color: #eeeeee;
  border-radius: 4px;
  border-style: solid;
  border-width: 1px;
  color: #212121;
}
.modal-box__btn button:nth-child(2) {
  background-color: #1435c3;
  border-color: #1435c3;
  border-radius: 4px;
  border-style: solid;
  border-width: 1px;
  color: #ffffff;
}

.over-layer {
  position: fixed;
  background-color: rgba(51, 51, 51, 0.6);
  width: 100%;
  height: 100%;
  z-index: 4;
  display: none;
}

.slick-arrow::before {
  color: rgb(255, 210, 0);
}

.slick-prev {
  position: absolute;
  left: 0;
  z-index: 2;
}

.slick-next {
  position: absolute;
  right: 0;
  z-index: 2;
}

.content-home {
  background-color: rgb(243, 243, 243);
  padding: 0;
}
.content-home-top {
  width: 100%;
  height: auto;
}
.content-home-top__banner {
  position: relative;
}
.content-home-top__banner img {
  width: 100%;
  min-height: 450px;
  object-fit: cover;
  box-shadow: #cccccc 0px 4px 6px 0px;
}
.content-home-top__slider {
  position: relative;
  transform: translateY(-50%);
}
.content-home-top__slider .content-top-slider-home-img {
  padding: 5px;
  max-height: 180px;
}
.content-home-top__slider .content-top-slider-home-img img {
  height: 100%;
  width: 100%;
  object-fit: cover;
  border-radius: 12px;
}
.content-home-top__slider .slick-prev {
  position: absolute;
  left: 20px;
  color: red;
  z-index: 2;
}
.content-home-top__slider .slick-next {
  position: absolute;
  right: 20px;
  color: red;
  z-index: 2;
  background-color: rgba(0, 0, 0, 0.5);
}
.content-home-features {
  color: #ffffff;
  margin-top: 100px;
  letter-spacing: 2px;
  line-height: 40px;
  padding: 26px 12px 40px 12px;
  text-align: center;
  background-color: #5430fe;
  border-radius: 12px;
  box-shadow: #cccccc 0px 4px 8px 0px;
}
.content-home-features__title {
  text-align: center;
  font-size: 45px;
  font-weight: 700;
}
.content-home-features__slider {
  margin-top: 25px;
}
.content-home-features__slider .slick-slide {
  padding: 0 5px;
}
.content-home-features__slider .slick-arrow {
  background-color: rgba(0, 0, 0, 0.5);
}
.content-home-features__slider .slick-prev {
  transform: translateX(150%);
  z-index: 2;
}
.content-home-features__slider .slick-next {
  transform: translateX(-150%);
  z-index: 2;
}
.content-home-features__slider-item {
  background-color: rgb(255, 255, 255);
  border-radius: 8px;
  color: rgb(51, 51, 51);
  font-size: 14px;
  line-height: 18px;
  padding: 10px 10px 20px;
  box-shadow: #cccccc 0px 4px 8px 0px;
  text-align: left;
}
.content-home-features__slider-item .item__img {
  max-height: 206px;
  text-align: center;
}
.content-home-features__slider-item .item__img img {
  height: 1000%;
  width: 100%;
  object-fit: cover;
  transition: all 0.2s linear;
}
.content-home-features__slider-item .item__img img:hover {
  transform: translateY(-3px);
}
.content-home-features__slider-item .item__sale {
  background-image: linear-gradient(to right, #3bacf0, #1b6dc1);
  border-radius: 20px;
  color: rgb(40, 138, 214);
  display: inline-block;
  padding-right: 5px;
  margin-top: 21px;
}
.content-home-features__slider-item .item__sale img {
  display: inline-block;
  width: 22px;
  height: 22px;
}
.content-home-features__slider-item .item__sale span {
  color: rgb(255, 255, 255);
  display: inline-block;
  font-size: 10px;
  line-height: 13px;
  margin: 0px 0px 0px 3px;
  padding: 4px 0px 0px 3px;
  text-transform: uppercase;
}
.content-home-features__slider-item .item__price {
  color: rgb(208, 2, 28);
  font-size: 18px;
  font-weight: 700;
  line-height: 18px;
  margin: 15px 0px 8px;
  text-align: center;
}
.content-home-features__slider-item .item__cart {
  display: flex;
  justify-content: space-evenly;
  margin-top: 10px;
}
.content-home-features__slider-item .item__cart span {
  background-color: #dfa3ee;
  padding: 5px 10px;
  border-radius: 5px;
  font-weight: 600;
}
.content-home-features__slider-item .item__cart span a {
  color: #ffffff;
  display: inline-block;
  margin-left: 5px;
  font-family: WorkSans;
}
.content-home-features__slider-item .item__cart span i {
  display: inline-block;
  padding-left: 6px;
}
.content-home-features__overview {
  display: flex;
  justify-content: center;
}
.content-home-features__overview a {
  padding: 8px 50px;
  background-color: #f3f3f3;
  margin-top: 25px;
  border-radius: 5px;
}
.content-home-trademark {
  margin-top: 50px;
}
.content-home-trademark__img img {
  width: 100%;
  height: auto;
  object-fit: cover;
}
.content-home-suggestion {
  margin-top: 40px;
}
.content-home-suggestion__title {
  color: rgb(51, 51, 51);
  font-size: 22px;
  font-weight: 700;
  line-height: 36px;
  padding: 0px 0px 10px;
  text-transform: uppercase;
}
.content-home-suggestion__main .tab li {
  background-color: rgb(255, 255, 255);
  border-radius: 8px;
  color: rgb(40, 138, 214);
  font-size: 14px;
  justify-content: center;
  line-height: 18px;
  padding: 8px 0px;
  align-items: center;
  display: flex;
  box-shadow: #cccccc 0px 4px 6px 0px;
}
.content-home-suggestion__main .tab li img {
  width: auto;
  height: 54px;
  display: inline-block;
}
.content-home-suggestion__main .tab li a {
  color: rgb(34, 34, 34);
  display: inline-block;
  font-size: 18px;
  font-weight: 500;
  line-height: 22px;
  margin-left: 5px;
}
.content-home-suggestion__main .tab .active {
  background-image: linear-gradient(64.85deg, #fca600 23.67%, #ffd41d 106.12%);
}
.content-home-suggestion__main .tab-content {
  margin-top: 25px;
}
.content-home-suggestion__main .tab-content__box {
  justify-content: space-between;
}
.content-home-suggestion__main .tab-content__box-item {
  background-color: rgb(255, 255, 255);
  border-radius: 8px;
  color: rgb(51, 51, 51);
  font-size: 14px;
  line-height: 18px;
  padding: 20px 30px;
  box-shadow: #cccccc 0px 4px 8px 0px;
  margin-top: 24px;
  text-align: center;
}
.content-home-suggestion__main .tab-content__box-item__img {
  text-align: center;
  max-height: 220px;
}
.content-home-suggestion__main .tab-content__box-item__img img {
  max-height: 220px;
  width: 100%;
  object-fit: scale-down;
  transition: all 0.1s linear;
}
.content-home-suggestion__main .tab-content__box-item__img img:hover {
  transform: translateY(-3px);
}
.content-home-suggestion__main .tab-content__box-item__sale {
  background-image: linear-gradient(to right, #3bacf0, #1b6dc1);
  border-radius: 20px;
  color: rgb(40, 138, 214);
  display: inline-block;
  padding-right: 5px;
  margin-top: 21px;
}
.content-home-suggestion__main .tab-content__box-item__sale img {
  display: inline-block;
  width: 22px;
  height: 22px;
  object-fit: cover;
}
.content-home-suggestion__main .tab-content__box-item__sale span {
  color: rgb(255, 255, 255);
  display: inline-block;
  font-size: 10px;
  line-height: 13px;
  margin: 0px 0px 0px 3px;
  padding: 4px 0px 0px 3px;
  text-transform: uppercase;
}
.content-home-suggestion__main .tab-content__box-item__title {
  color: #288ad6;
  font-size: 16px;
  font-weight: 600;
  line-height: 21px;
  margin: 0px 0px 8px;
  font-family: WorkSans;
  text-align: center;
  margin-top: 5px;
}
.content-home-suggestion__main .tab-content__box-item__price {
  color: rgb(208, 2, 28);
  font-size: 18px;
  font-weight: 700;
  line-height: 18px;
  margin: 15px 0px 8px;
  text-align: center;
}
.content-home-suggestion__main .tab-content__box-item__cart {
  display: flex;
  justify-content: space-evenly;
  margin-top: 10px;
}
.content-home-suggestion__main .tab-content__box-item__cart span {
  background-color: #dfa3ee;
  padding: 5px 10px;
  border-radius: 5px;
  font-weight: 600;
}
.content-home-suggestion__main .tab-content__box-item__cart span a {
  color: #ffffff;
  display: block;
  font-family: WorkSans;
}
.content-home-suggestion__main .tab-content__box-item__cart span i {
  display: inline-block;
  padding-left: 6px;
}
.content-home-suggestion__overview span {
  margin-top: 25px;
}
.content-home-post {
  margin-top: 50px;
}
.content-home-post-main {
  background-color: #ffffff;
  box-shadow: #cccccc 0px 4px 6px 0px;
}
.content-home-post-main__title {
  display: flex;
  justify-content: space-between;
  line-height: 36px;
  padding: 15px 22px;
}
.content-home-post-main__title h2 {
  color: rgb(51, 51, 51);
  font-size: 22px;
  font-weight: 700;
  text-transform: uppercase;
}
.content-home-post-main__title h4 {
  color: rgb(85, 85, 85);
  text-transform: uppercase;
}
.content-home-post-main__title h4 a {
  font-size: 15px;
  font-weight: 500;
  line-height: 36px;
}
.content-home-post-main__list__img {
  width: 100%;
  height: auto;
}
.content-home-post-main__list__img img {
  width: 100%;
  object-fit: cover;
  height: auto;
  border-radius: 8px;
}
.content-home-post-main__list__description {
  color: rgb(51, 51, 51);
  line-height: 26px;
  margin: 10px 0px;
  text-align: left;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.content-product {
  margin-top: 9px;
}
.content-product-top {
  display: grid;
  grid-template-columns: repeat(6, 1fr);
  grid-template-rows: repeat(2, 100px);
  grid-auto-flow: row dense;
  grid-gap: 10px;
  padding: 0 0px;
}
.content-product-top__slider {
  grid-column: 1/5;
  grid-row: 1/3;
}
.content-product-top__slider-img {
  display: block;
  height: 100%;
  width: 100%;
}
.content-product-top__slider-img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.content-product-top__banner--1 {
  grid-row: 1/2;
  grid-column: 5/7;
}
.content-product-top__banner--1 img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.content-product-top__banner--2 {
  grid-row: 2/3;
  grid-column: 5/7;
}
.content-product-top__banner--2 img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.content-product-main {
  margin-top: 50px;
  padding: 0;
}
.content-product-main-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.content-product-main-header__title {
  font-size: 50px;
  color: rgb(91, 82, 58);
  font-weight: 100;
}
.content-product-main-header__filter {
  cursor: pointer;
  color: grey;
  font-weight: 100;
  padding: 5px 8px;
  border: 1px solid #cccccc;
  box-shadow: #cccccc 0px 4px 6px 0px;
}
.content-product-main .filter-active {
  background-color: rgba(217, 211, 211, 0.576) !important;
}
.content-product-main__filter {
  box-shadow: #cccccc 0px 4px 6px 0px;
  margin-top: 30px;
  background-color: rgba(217, 211, 211, 0.576);
  padding: 10px 30px 25px 30px;
  border-radius: 10px;
}
.content-product-main__filter ul li:not(:nth-child(1)) {
  line-height: 30px;
}
.content-product-main__filter ul li:not(:nth-child(1)):hover {
  color: blueviolet;
}
.content-product-main__filter__title {
  color: black;
  font-weight: bold;
  line-height: 48px;
}
.content-product-main__show {
  padding: 0;
  margin-top: 40px;
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
}
.content-product-main__show .overview--btn {
  width: 100%;
}
.content-product-main__show .overview--btn span {
  margin-top: 25px;
}
.content-product-main__show .product-main__show-item {
  width: 20%;
  padding: 32px 16px;
  border: 0.1px solid #cccccc;
}
.content-product-main__show .product-main__show-item:hover .product-main__show-item__img {
  transform: translateY(-10px);
  transform: scale(1.1);
}
.content-product-main__show .product-main__show-item:hover {
  box-shadow: #cccccc 0px 5px 9px 3px;
}
.content-product-main__show .product-main__show-item__img {
  transition: all 0.2s linear;
  max-height: 209px;
  height: auto;
}
.content-product-main__show .product-main__show-item__img img {
  height: 100%;
  overflow: cover;
  width: 100%;
}
.content-product-main__show .product-main__show-item__sale {
  margin-top: 22px;
}
.content-product-main__show .product-main__show-item__name {
  color: #288ad6;
  font-family: Helvetica;
  font-size: 14px;
  line-height: 20px;
  margin: 0px 0px 5px;
  text-align: left;
  margin-top: 10px;
}
.content-product-main__show .product-main__show-item__price {
  color: #222222;
  font-weight: 700;
  line-height: 18px;
  margin: 0px 0px 5px;
  text-align: left;
}
.content-product-main__show .product-main__show-item__cart {
  justify-content: space-between;
  margin-top: 15px;
}

.content-sale {
  padding: 0;
}
.content-sale-top {
  width: 100%;
  height: 680px;
  background-image: url("../../images/banner-home.png");
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center top;
  display: block;
  position: relative;
}
.content-sale-top__detail {
  width: 100%;
  display: flex;
  padding: 0 80px;
  justify-content: space-around;
  position: absolute;
  bottom: 2%;
}
.content-sale-top__detail__img {
  display: block;
  cursor: pointer;
}
.content-sale-top__detail__img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.content-sale-hot-banner {
  padding: 0;
  margin: 25px auto;
}
.content-sale-hot-banner img {
  width: 100%;
  height: auto;
  object-fit: cover;
}
.content-sale-main {
  margin-top: 50px;
  padding: 0;
  background-color: rgb(255, 255, 255);
}
.content-sale-main__header {
  height: 89px;
  width: 100%;
}
.content-sale-main__header img {
  height: 100%;
  width: 100%;
  object-fit: cover;
}
.content-sale-main__show {
  margin-top: 26px;
}
.content-sale-main__show-item {
  display: flex;
  border-radius: 15px;
  padding: 20px 0px;
  box-shadow: #cccccc 0px 4px 6px 0px;
}
.content-sale-main__show-item__img {
  width: 50%;
  text-align: center;
}
.content-sale-main__show-item__img img {
  width: 80%;
  height: 250px;
  object-fit: scale-down;
}
.content-sale-main__show-item__description {
  width: 50%;
}
.content-sale-main__show-item__description .show-item-description__name {
  color: rgb(51, 51, 51);
  font-family: Helvetica;
  font-size: 25px;
  font-weight: 700;
  line-height: 30px;
  margin: 15px 0px 0px;
}
.content-sale-main__show-item__description .show-item-description__old-price {
  font-family: Helvetica;
  font-size: 18px;
  line-height: 18px;
  text-decoration: line-through;
  margin-top: 13px;
}
.content-sale-main__show-item__description .show-item-description__new-price {
  color: rgb(255, 0, 0);
  font-size: 27px;
  font-weight: 700;
  line-height: 18px;
  margin: 13px 0px 0px;
}
.content-sale-main__product {
  margin-top: 50px;
  display: flex;
  justify-content: flex-start;
  justify-content: space-between;
  flex-wrap: wrap;
}
.content-sale-main__product-item {
  margin-top: 1%;
  background-color: rgb(255, 255, 255);
  box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 12px 0px;
  color: rgb(51, 51, 51);
  font-size: 14px;
  line-height: 18px;
  padding: 10px 15px 40px;
  flex-basis: 19%;
}
.content-sale-main__product-item .sale-main__product-item__img {
  transition: all 0.3s linear;
}
.content-sale-main__product-item .sale-main__product-item__img img {
  width: 100%;
  height: 200px;
  object-fit: scale-down;
}
.content-sale-main__product-item .sale-main__product-item__img:hover {
  transform: scale(1.2);
  transform: translateY(-10px);
}
.content-sale-main__product-item .sale-main__product-item__sale {
  margin-top: 15px;
  background: linear-gradient(to right, #ef3006, #c60004);
}
.content-sale-main__product-item .sale-main__product-item__name {
  margin-top: 14px;
  color: rgb(40, 138, 214);
  display: -webkit-box;
  font-family: Helvetica;
  font-size: 14px;
  line-height: 20px;
  margin: 0px 0px 5px;
}
.content-sale-main__product-item .sale-main__product-item__old-price {
  margin-top: 10px;
  font-size: 14px;
  line-height: 18px;
  margin: 0px 0px 5px;
  text-decoration: line-through;
}
.content-sale-main__product-item .sale-main__product-item__new-price {
  margin-top: 10px;
  color: rgb(34, 34, 34);
  font-weight: 700;
  line-height: 18px;
  margin: 0px 0px 5px;
}
.content-sale-main__product-item .sale-main__product-item__cart {
  margin-top: 10px;
  justify-content: space-between;
}
.content-sale-main__overview {
  margin-top: 40px;
}
.content-sale-main__overview span {
  color: blue;
}
.content-sale-main__overview:hover span {
  color: #fff;
}

.content-cart {
  background-color: w;
  display: flex;
  padding: 0;
  justify-content: space-between;
  flex-wrap: wrap;
  margin-top: 50px;
  align-items: flex-start;
}
.content-cart-detail {
  display: flex;
  width: 66%;
  flex-wrap: wrap;
}
.content-cart-detail-top {
  padding-right: 20px;
  width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.content-cart-detail-top__title {
  color: rgb(51, 51, 51);
  font-size: 24px;
  font-weight: 700;
  line-height: 20px;
}
.content-cart-detail-top__clear-all {
  border-color: #000000;
  border-radius: 4px;
  border-style: solid;
  border-width: 1px;
  color: #7dd2eb;
  font-size: 14px;
  line-height: 16px;
  border: none;
}
.content-cart-detail-top__clear-all:hover {
  color: red;
}
.content-cart-detail-main {
  width: 100%;
  margin-top: 20px;
}
.content-cart-detail-main table {
  width: 100%;
  padding: 16px;
  text-align: center;
}
.content-cart-detail-main table thead {
  width: 100%;
}
.content-cart-detail-main table thead th {
  padding: 20px 0;
  color: rgb(51, 51, 51);
  font-size: 13px;
  font-weight: 500;
  line-height: 20px;
  border-bottom: 0.1px solid rgb(234, 234, 234);
}
.content-cart-detail-main table tbody td {
  padding: 20px 5px;
}
.content-cart-detail-main table tbody .content-cart-detail-main__check {
  width: 2%;
}
.content-cart-detail-main table tbody .content-cart-detail-main__img {
  width: 20%;
}
.content-cart-detail-main table tbody .content-cart-detail-main__img img {
  width: 80%;
  height: auto;
  object-fit: cover;
  padding: 20px;
  border: 0.1px solid rgb(234, 234, 234);
}
.content-cart-detail-main table tbody .content-cart-detail-main__info {
  color: rgb(67, 70, 87);
  line-height: 24px;
  font-size: 13px;
  width: 34%;
}
.content-cart-detail-main table tbody .content-cart-detail-main__price {
  color: rgb(67, 70, 87);
  font-size: 15px;
  font-weight: 700;
  line-height: 24px;
}
.content-cart-detail-main table tbody .content-cart-detail-main__number input {
  width: 45px;
}
.content-cart-detail-main table tbody .content-cart-detail-main__number button {
  padding: 4px 6px;
  border-radius: 0;
  box-shadow: #cccccc 0px 4px 8px 0px;
  background-color: rgb(243, 247, 247);
}
.content-cart-detail-main table tbody .content-cart-detail-main__total-price {
  font-size: 15px;
  font-weight: 700;
  line-height: 24px;
  color: rgb(20, 53, 195);
}
.content-cart-pay {
  width: 32%;
  padding: 0px 10px 20px 10px;
}
.content-cart-pay__title {
  text-align: center;
  color: #333333;
  font-family: Roboto;
  font-size: 24px;
  font-weight: 700;
  padding: 20px 0;
  border-bottom: 0.1px solid rgb(234, 234, 234);
}
.content-cart-pay-main {
  margin-top: 30px;
  width: 100%;
}
.content-cart-pay-main__total {
  display: flex;
  justify-content: space-between;
}
.content-cart-pay-main__total span:nth-child(1) {
  display: block;
  color: #848788;
  display: table-cell;
  font-size: 14px;
  line-height: 14px;
}
.content-cart-pay-main__total span:nth-child(2) {
  color: #eb2101;
  display: inline-block;
  font-size: 20px;
  font-weight: 700;
  line-height: 20px;
}
.content-cart-pay-main__payment-method {
  margin-top: 20px;
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
}
.content-cart-pay-main__payment-method span {
  width: 50%;
  display: block;
  color: #848788;
  display: table-cell;
  font-size: 14px;
  line-height: 14px;
}
.content-cart-pay-main__payment-method .payment-method-wrapper {
  width: 38%;
  display: flex;
  flex-wrap: wrap;
  color: red;
}
.content-cart-pay-main__payment-method .payment-method-wrapper .payment-method {
  width: 100%;
  display: flex;
}
.content-cart-pay-main__payment-method .payment-method-wrapper .payment-method:nth-child(2) {
  margin-top: 15px;
}
.content-cart-pay-main__payment-method .payment-method-wrapper .payment-method span {
  margin-left: 15px;
  width: 80%;
  color: #333333;
  font-size: 13px;
  font-weight: 700;
  line-height: 18px;
}
.content-cart-pay-order {
  margin-top: 40px;
  display: flex;
  flex-wrap: wrap;
  text-align: center;
  justify-content: space-between;
}
.content-cart-pay-order input,
.content-cart-pay-order textarea {
  outline: none;
  width: 100%;
  text-align: left;
  background-color: rgb(229, 229, 229);
  border-color: rgb(229, 229, 229);
  border-radius: 13px;
  border-style: solid;
  border-width: 1px;
  color: rgb(51, 51, 51);
  font-size: 13px;
  padding: 10px 12px;
}
.content-cart-pay-order select {
  outline: none;
  background-color: rgb(229, 229, 229);
  border-color: rgb(229, 229, 229);
  border-radius: 13px;
  border-style: solid;
  border-width: 1px;
  color: rgb(51, 51, 51);
  font-size: 13px;
  padding: 10px 12px;
}
.content-cart-pay-order__title {
  width: 100%;
  text-align: center;
  color: rgb(51, 51, 51);
  font-size: 20px;
  font-weight: 700;
  text-align: center;
}
.content-cart-pay-order__warring {
  color: rgb(170, 170, 170);
  width: 100%;
  font-size: 13px;
  text-align: center !important;
  margin-top: 15px;
}
.content-cart-pay-order__name {
  margin-top: 13px;
}
.content-cart-pay-order__phone {
  margin-top: 13px;
}
.content-cart-pay-order__city {
  width: 45%;
  margin-top: 13px;
}
.content-cart-pay-order__district {
  width: 45%;
  margin-top: 13px;
}
.content-cart-pay-order__email {
  margin-top: 13px;
}
.content-cart-pay-order__note {
  margin-top: 13px;
}
.content-cart-pay-submit {
  width: 100%;
  margin-top: 40px;
  background-color: #1435c3;
  border-color: #1435c3;
  border-radius: 4px;
  border-style: solid;
  border-width: 1px;
  color: #ffffff;
  font-size: 14px;
  justify-content: center;
  line-height: 16px;
  margin: 16px 0px 0px;
  padding: 11.2px 16px;
  text-align: center;
}

.content-product-detail {
  margin-top: 50px;
}
.content-product-detail__main {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.content-product-detail__main-info {
  width: 100%;
  display: flex;
  justify-content: space-between;
}
.content-product-detail__main-info__left {
  width: 40%;
  display: flex;
  flex-wrap: wrap;
}
.content-product-detail__main-info__left .info__left__img {
  width: 100%;
  text-align: center;
}
.content-product-detail__main-info__left .info__left__img img {
  width: 100%;
  height: auto;
  min-height: 270px;
  object-fit: cover;
  padding: 20px;
}
.content-product-detail__main-info__left .info__left__slider {
  width: 100%;
  margin-top: 20px;
  position: relative;
}
.content-product-detail__main-info__left .info__left__slider__img img {
  width: 100%;
  height: auto;
  object-fit: cover;
}
.content-product-detail__main-info__left .info__left__slider .slick-arrow::before {
  color: rgb(255, 210, 0);
}
.content-product-detail__main-info__left .info__left__slider .slick-prev {
  position: absolute;
  left: 0;
  z-index: 2;
}
.content-product-detail__main-info__left .info__left__slider .slick-next {
  position: absolute;
  right: 0;
  z-index: 2;
}
.content-product-detail__main-info__left .info__left__slider .slick-dots li button {
  color: rgb(236, 196, 203);
}
.content-product-detail__main-info__left .info__left__slider .slick-dots li button::before {
  color: red;
  font-size: 10px;
}
.content-product-detail__main-info__right {
  width: 56%;
  display: flex;
  flex-direction: column;
}
.content-product-detail__main-info__right .info__right__name {
  color: rgb(51, 51, 51);
  font-size: 24px;
  font-weight: 500;
  line-height: 31.92px;
  padding: 0px 0px 10px 0px;
  border-bottom: 1px solid rgb(228, 228, 228);
}
.content-product-detail__main-info__right .info__right__description {
  color: rgb(51, 51, 51);
  font-weight: 500;
  line-height: 18px;
  margin-top: 14px;
}
.content-product-detail__main-info__right .info__right__trademark {
  margin-top: 15px;
}
.content-product-detail__main-info__right .info__right__trademark span:nth-child(1) {
  color: rgb(51, 51, 51);
  font-size: 14px;
  line-height: 20px;
}
.content-product-detail__main-info__right .info__right__trademark span:nth-child(2) {
  color: rgb(255, 140, 97);
  display: inline;
  font-size: 14px;
  line-height: 16px;
}
.content-product-detail__main-info__right .info__right__color {
  margin-top: 15px;
  display: flex;
  justify-content: flex-start;
  font-size: 13px;
}
.content-product-detail__main-info__right .info__right__color label {
  display: block;
  cursor: pointer;
  margin-right: 10px;
  padding: 10px;
  color: white;
  background-color: rgb(128, 60, 60);
}
.content-product-detail__main-info__right .info__right__status {
  margin-top: 20px;
}
.content-product-detail__main-info__right .info__right__status span {
  font-size: 14px;
}
.content-product-detail__main-info__right .info__right__status span:nth-child(1) {
  font-weight: 700;
}
.content-product-detail__main-info__right .info__right__status span:nth-child(2) {
  color: rgb(247, 130, 18);
  font-size: 14px;
}
.content-product-detail__main-info__right .info__right__number {
  width: 100px;
  display: flex;
  margin-top: 10px;
  justify-content: space-between;
  background-color: #cccccc;
  text-align: center;
}
.content-product-detail__main-info__right .info__right__number span {
  cursor: pointer;
  width: 25%;
}
.content-product-detail__main-info__right .info__right__number input {
  width: 44px;
  width: 50%;
}
.content-product-detail__main-info__right .info__right__new-price {
  margin-top: 20px;
  color: rgb(253, 71, 90);
  font-size: 25px;
  font-weight: 700;
}
.content-product-detail__main-info__right .info__right__old-price {
  text-decoration: line-through;
  color: rgb(130, 134, 158);
  font-size: 12px;
  margin-top: 15px;
}
.content-product-detail__main-info__right .info__right__btn-add {
  margin-top: 30px;
}
.content-product-detail__main-info__right .info__right__btn-add a {
  display: block;
  background: transparent linear-gradient(180deg, #fd475a 0%, #bf1e2d 100%) 0% 0% no-repeat padding-box;
  border-radius: 3px;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 4px 6px 0px;
  color: rgb(255, 255, 255);
  font-family: -apple-system;
  font-size: 13px;
  margin: 0px 6px 0px 0px;
  padding: 10px;
  text-align: center;
}
.content-product-detail__main-info__right .info__right__banner {
  margin-top: 50px;
}
.content-product-detail__main-info__right .info__right__banner a {
  display: block;
  width: 100%;
}
.content-product-detail__main-info__right .info__right__banner a img {
  width: 100%;
  max-height: 165px;
  object-fit: cover;
}
.content-product-detail__main-description {
  margin-top: 30px 20px;
  width: 100%;
  padding: 10px;
  box-shadow: #cccccc 0px 4px 8px 0px;
}
.content-product-detail__main-description .main-description__title {
  width: 100%;
  text-align: center;
  color: #1b1d29;
  display: -webkit-box;
  font-size: 26px;
  font-weight: 600;
  line-height: 28px;
}
.content-product-detail__main-description .main-description__title p {
  width: 100%;
}
.content-product-detail__main-description .main-description__description {
  color: #333333;
  font-family: Roboto;
  font-size: 14px;
  line-height: 20px;
  margin: 0px 0px 16px;
  height: 400px;
  overflow: hidden;
}
.content-product-detail__main-description .active {
  height: auto;
}
.content-product-detail__main-description .main-description__overview {
  width: 100%;
  text-align: center;
  margin-bottom: 10px;
}
.content-product-detail__main-description .main-description__overview span {
  padding: 10px 20px;
  cursor: pointer;
  color: #fff;
  background-color: blueviolet;
}
.content-product-detail__related {
  margin-top: 35px;
}
.content-product-detail__related__title {
  color: rgb(27, 29, 41);
  display: -webkit-box;
  font-size: 20px;
  font-weight: 700;
  line-height: 28px;
}
.content-product-detail__related .related__slider-item {
  background-color: rgb(255, 255, 255);
  box-shadow: rgba(0, 0, 0, 0.12) 0px 2px 12px 0px;
  color: rgb(51, 51, 51);
  font-size: 12px;
  line-height: 18px;
  padding: 15px;
}
.content-product-detail__related .related__slider-item__img {
  transition: all 0.3s linear;
}
.content-product-detail__related .related__slider-item__img img {
  width: 100%;
  height: 200px;
  object-fit: scale-down;
}
.content-product-detail__related .related__slider-item__img:hover {
  transform: scale(1.2);
  transform: translateY(-10px);
}
.content-product-detail__related .related__slider-item__name {
  margin-top: 14px;
  color: rgb(40, 138, 214);
  display: -webkit-box;
  font-family: Helvetica;
  font-size: 11px;
  line-height: 20px;
  margin: 0px 0px 5px;
}
.content-product-detail__related .related__slider-item__sale {
  margin-top: 12px;
  background: linear-gradient(to right, #ef3006, #c60004);
}
.content-product-detail__related .related__slider-item__old-price {
  margin-top: 8px;
  font-size: 12px;
  line-height: 16px;
  margin: 0px 0px 5px;
  text-decoration: line-through;
}
.content-product-detail__related .related__slider-item__new-price {
  margin-top: 8px;
  color: rgb(34, 34, 34);
  font-weight: 700;
  line-height: 16px;
  margin: 0px 0px 5px;
}
.content-product-detail__related .related__slider-item__cart {
  margin-top: 10px;
  justify-content: space-between;
}

.footer {
  padding: 15px 0px 5px 0px;
  margin-top: 160px;
  background-color: white;
  border-color: rgb(226, 226, 226);
  border-style: solid none none;
  border-width: 1px 0px 0px;
  color: rgb(51, 51, 51);
  font-size: 14px;
  line-height: 18px;
  box-shadow: #cccccc 0px -4px -8px 0px;
}
.footer .container {
  padding: 0;
}
.footer-list li {
  font-size: 14px;
  line-height: 26px;
  color: rgb(51, 51, 51);
}
.footer-list .footer-list__title {
  color: rgb(51, 51, 51);
  display: inline;
  font-size: 14px;
  font-weight: 700;
  line-height: 18px;
}
.footer-group h3 {
  color: rgb(34, 34, 34);
  font-size: 14px;
  line-height: 21px;
}
.footer-group-main .col {
  display: flex;
}
.footer-group-main__img {
  height: 30px;
  margin-top: 24px;
}
.footer-group-main__img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.footer-end {
  padding: 30px 0;
  color: rgb(102, 102, 102);
  font-family: Arial, Helvetica, sans-serif;
  font-size: 12px;
  line-height: 18px;
  margin-top: 30px;
}
.footer-end a {
  color: blue;
}

/*# sourceMappingURL=style.cs.map */
