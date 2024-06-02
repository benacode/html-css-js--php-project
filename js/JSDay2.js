function messageReturn(value1, value2) {
  return `${value1} ${value2}`;
}
function message(message1, message2) {
  const x = 3;
  console.log(x);
  if (x >= 3) {
    document.getElementById('pdi1').innerHTML = message1;
    console.log('done local variable:', message2);
  }
  const messageRe = messageReturn('Alex', 'boom');
  alert(messageRe);

  const person = {
    firsName: 'hi',
    lastname: 'bye',
    display1() {
      return this.lastname;
    },
  };
  person.firsName = 'John';
  const stud = {};// const stud=new Object();
  stud.grade = 23;
  stud.sec = 'A';

  let fullName = '';

  Object.values(person).forEach((value) => {
    fullName += `${value} `;
  });
  return fullName;
}
message('cs', 'cci');
// const arr = Object.values(person);
// const json1 = JSON.stringify(person);
// document.getElementById('id1').innerHTML = `${json1} `;
const str = 'AS\'s';
console.log(str.toLowerCase());
const sec = ['a', 'b', 'v'];
const sec1 = [];
sec1[0] = 'k';
console.log(str.toString);
sec1.sort();