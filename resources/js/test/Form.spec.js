import { shallowMount, mount } from '@vue/test-utils';
import Form from '../components/ReservationComponent.vue';

test('Form', () => {
  const wrapper = shallowMount(Form)

  wrapper.setData({ table_number: ' '.repeat(0) })
  wrapper.setData({ client_tel: ' '.repeat(0) })
  wrapper.setData({ client_mail: ' '.repeat(0) })
  wrapper.setData({ client_name: ' '.repeat(0) })

  expect(wrapper.find('.invalid-feedback').exists()).toBe(true)

  wrapper.setData({ table_number: '4' })
  wrapper.setData({ client_tel: '88005553535' })
  wrapper.setData({ client_mail: 'mail@mail.ru' })
  wrapper.setData({ client_name: 'Test' })

  expect(wrapper.find('.invalid-feedback').exists())

  wrapper.find('button').trigger('click')

  wrapper.setData({ table_number: ' '.repeat(6) })
  wrapper.setData({ client_tel: ' '.repeat(6) })

  expect(wrapper.find('.invalid-feedback').exists()).toBe(true)

  wrapper.setData({ table_number: '4' })
  wrapper.setData({ client_tel: '88005553535' })

  expect(wrapper.find('.invalid-feedback').exists())

  wrapper.setData({ table_number: ' '.repeat(16) })
  wrapper.setData({ client_tel: ' '.repeat(16) })

  expect(wrapper.find('.invalid-feedback').exists()).toBe(true)

  wrapper.setData({ table_number: '6' })
  wrapper.setData({ client_tel: '88005553535' })

  expect(wrapper.find('.invalid-feedback').exists())
})
