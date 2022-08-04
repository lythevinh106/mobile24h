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

/*# sourceMappingURL=orther.cs.map */
