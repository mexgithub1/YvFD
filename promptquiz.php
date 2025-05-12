<style>
  .promptquiz{
    position: fixed;
    bottom: 0;
    z-index: 1000;
    background-color: #3b3b3b;
    height: 400px;
    width: 100%;
    color: #fff;
    font-size: 25px;
    text-align: center;
    align-items: center;
    align-content: center;
    transition: 0.3s;
  }

  .promptquiz-hide{
    transform: translateY(100%);
  }

  .promptquiz a{
    padding: 15px 50px;
    border-radius: 10px;
    font-size: 18px;
    font-weight: bold;
    color: #000;
    border: 2px solid #fff;
    margin: 0px 20px;
    cursor: pointer;
  }
</style>
<div class="promptquiz">
  <div class="paragraph container">
  Before proceeding with this assessment, please remember that this is not a substitute for professional guidance. If you are experiencing emotional distress, anxiety, or any mental health concerns, we strongly encourage you to seek support from the Guidance Counselor of AUP. Professional counselors are trained to provide personalized assistance and can help you navigate any challenges you may be facing. Your well-being is important, and you don’t have to go through this alone. If you need immediate support, please reach out to the AUP Guidance Office.
  </div>
  <br>
  <div>
    <a href="takequestionnaire.php" class="accept" style="background-color: #fff;">Accept</a>
    <a class="decline" style="color: #fff;">Decline</a>
  </div>
</div>
