let x=3
function message(message1, message2)
{
    console.log(x);
    if(x>=3)
        {
        document.getElementById('pdi1').innerHTML=message1;
          var y=10; 
          console.log("done local variable:",message2) 
        }
       let message_re= message_return('Alex',"boom")
       alert(message_re);
}

function message_return(value1, value2)
{

   return value1 +" " +value2;
}

const person={firsName:"hi",lastname:"bye",
display1: function(){
    return this.lastname;
}
};
person.firsName="John";
const stud={}//const stud=new Object();
stud.grade=23;
stud.sec="A";

let name1=person['firsName'];
let lastname1=person['lastname'];
let func=person['display1'];

let fullName='';




for(let data in person){
    fullName +=person[data]+" ";

}
const arr=Object.values(person);
let json1=JSON.stringify(person)
//document.getElementById('id1').innerHTML=Date() + " ";
 let str='CS\'s'
 console.log(str.toLowerCase)
 let sec=new Array('a','b','v');
 let sec1=[];
 sec1[0]='k';
document.write(sec.toString)
sec1.sort();