import Akvariumas from './Akvariumas';
import Garazas from './Garazas';
import Namas from './Namas';
import Narvas from './Narvas';

const Pasaulis = (props) => {
  return (
    <>
      {props.values.map((value, i) => {
        let lreturn;
        if (value.type === 'man') {
          lreturn = (
            <Namas
              key={i}
              values={value}
            />
          );
        } else if (
          value.type === 'animal'
        ) {
          lreturn = (
            <Narvas
              key={i}
              values={value}
            />
          );
        } else if (
          value.type === 'car'
        ) {
          lreturn = (
            <Garazas
              key={i}
              values={value}
            />
          );
        } else if (
          value.type === 'fish'
        ) {
          lreturn = (
            <Akvariumas
              key={i}
              values={value}
            />
          );
        }
        if (value.id % 2 === 0) {
          return lreturn;
        } else {
          return lreturn;
        }
      })}
    </>
  );
};

export default Pasaulis;
