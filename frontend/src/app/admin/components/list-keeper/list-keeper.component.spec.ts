import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ListKeeperComponent } from './list-keeper.component';

describe('ListKeeperComponent', () => {
  let component: ListKeeperComponent;
  let fixture: ComponentFixture<ListKeeperComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ListKeeperComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ListKeeperComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
