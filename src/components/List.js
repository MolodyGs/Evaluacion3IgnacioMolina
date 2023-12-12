import { StyleSheet, Text, View } from 'react-native'
import React from 'react'

const api = () => {
  const [datos, setDatos] = useState(null);

  useEffect(() => {

    getData();
  }, []);

  const getData = async () => {
    try {
      const response = await fetch('https://172.30.2.127/api/products');
      const data = await response.json();

      setDatos(data);
    } catch (error) {
      console.error('Error al obtener datos de la API:', error);
    }
  };

  return (
    <View>
      {datos ? (
        <Text>{JSON.stringify(datos)}</Text>
      ) : (
        <Text>Cargando datos...</Text>
      )}
    </View>
  );

};
export default function List() {
  return (
    <View>
      <Text>List of Products</Text>
    </View>
  )
}

const styles = StyleSheet.create({})
