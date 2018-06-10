import { CursoAngular4AvanzadoPage } from './app.po';

describe('curso-angular4-avanzado App', () => {
  let page: CursoAngular4AvanzadoPage;

  beforeEach(() => {
    page = new CursoAngular4AvanzadoPage();
  });

  it('should display message saying app works', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('app works!');
  });
});
